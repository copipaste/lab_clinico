<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\HemogramaCompleto;
use App\Models\Bioquimico;
use App\Models\Hormonas;
use App\Models\Notificacion;
use App\Models\TipoAnalisis;
use Illuminate\Http\Request;


class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    public function index(Request $request)
    {
        $heads = [
            'Orden',
            'Id',
            'Descripcion',
            'Paciente',
            'Fecha - Hora',
            'Estado',
            ['label' => 'Acciones', 'no-export' => true],
        ];

        $analisis = Analisis::all();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            // Apply date filter
            $analisis = Analisis::whereDate('created_at', '>=', $start_date)
                                ->whereDate('created_at', '<=', $end_date)
                                ->get();
        } else {
            // Load all records if no date range is provided
            $analisis = Analisis::all();
        }

        $tipoanalisis = TipoAnalisis::all();
        return view('analisis.index', compact('analisis', 'tipoanalisis', 'heads'));
        return view('analisis.index', compact('analisis', 'tipoanalisis', 'heads', 'start_date', 'end_date'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    //Hemogramas
    public function hemograma($id)
    {
        $analisis = Analisis::findOrFail($id);
        // Obtener datos relacionados
        $idOrden = $analisis->orden->nroOrden;
        $nombrepaciente = $analisis->orden->paciente->nombre;
        $bioquimico = Bioquimico::all();


        return view('analisis.hemograma', compact('analisis', 'idOrden', 'bioquimico', 'nombrepaciente'));
    }
    public function hemogramastore(Request $request)
    {
        $hemograma = new HemogramaCompleto();
        $hemograma->globulosRojos = $request->input('globulosrojo');
        $hemograma->hematocrito = $request->input('hematocrito');
        $hemograma->hemoglobina = $request->input('hemoglobina');
        $hemograma->VCM = $request->input('VCM');
        $hemograma->HCM = $request->input('HCM');
        $hemograma->CHCM = $request->input('CHCM');
        $hemograma->VSG = $request->input('VSG');
        $hemograma->plaquetas = $request->input('plaquetas');
        $hemograma->recuento = $request->input('recuento');
        $hemograma->globulosBlancos = $request->input('globulosblanco');
        $hemograma->promielocitos = $request->input('promielocito');
        $hemograma->mielocitos = $request->input('mielocito');
        $hemograma->metamielocitos = $request->input('metamielocitos');
        $hemograma->cayados = $request->input('cayados');
        $hemograma->segmentados = $request->input('segmentados');
        $hemograma->linfocitos = $request->input('linfocitos');
        $hemograma->monocitos = $request->input('monocitos');
        $hemograma->eosinofilos = $request->input('eosinofilos');
        $hemograma->basofilos = $request->input('basofilos');
        $hemograma->grupoSanguineo = $request->input('gruposanguineo');
        $hemograma->factorRh = $request->input('factorrh');
        $hemograma->VDRL = $request->input('VDRL');
        $hemograma->baciloscopia = $request->input('baciloscopia');
        $hemograma->coproparasitologico = $request->input('coproparasitologico');
        $hemograma->metodo = $request->input('metodo');
        $hemograma->resultado = $request->input('resultado');
        $hemograma->idAnalisis = $request->input('idAnalisis');
        $hemograma->save();
        $analisis = Analisis::find($request->input('idAnalisis'));
        $analisis->idBioquimico = $request->input('idbioquimico');
        $analisis->estado = 'Realizado';                             // -->>>> cambia el estado cuando el bioquimico realiza el analisis
        $analisis->save();

        $this->crearNotificacion($analisis->orden->paciente->id, $analisis->id); // esta linea de codigo tengo que meter para crear la notificacion al paciente

        activity()
        ->causedBy(auth()->user())
        ->withProperties(request()->ip()) // Obtener la dirección IP del usuario
        ->log('agrego un hemograma');
    session()->flash('success', 'Se registró exitosamente');

        return redirect()->route('analisis.index')->with('success', '¡Se ha registrado exitosamente!');
    }



    public function crearNotificacion($pacienteId, $analisisId)
    {
        $notificacion = new Notificacion();
        $notificacion->pacienteId = $pacienteId;
        $notificacion->read = false;
        $notificacion->analisisId = $analisisId;
        $notificacion->save();
    }



    public function hormona($id)
    {
        $analisis = Analisis::findOrFail($id);
        $idOrden = $analisis->orden->nroOrden;
        $nombrepaciente = $analisis->orden->paciente->nombre;
        // $nombrePaciente = $analisis->orden->paciente->nomwbre; // Asumiendo que tienes la relación definida
        // $nombreSeguro = $analisis->orden->paciente->tipoSeguro->descripcion; // Asumiendo que tienes la relación definida
        $bioquimico = Bioquimico::all();


        return view('analisis.hormona', compact('analisis', 'idOrden', 'bioquimico', 'nombrepaciente'));
    }

    public function hormonastore(Request $request)
    {

        $hormonas = new Hormonas();
        $hormonas->TSH = $request->input('TSH');
        $hormonas->TSH = $request->input('TSH');
        $hormonas->T3 = $request->input('T3');
        $hormonas->T4 = $request->input('T4');
        $hormonas->TSHNeonatal = $request->input('TSHNeonatal');
        $hormonas->T4Libre = $request->input('T4Libre');
        $hormonas->progesterona = $request->input('progesterona');
        $hormonas->prolactina = $request->input('prolactina');
        $hormonas->estradiol = $request->input('estradiol');
        $hormonas->cortisol8am = $request->input('cortisol8am');
        $hormonas->cortisol16pm = $request->input('cortisol16pm');
        $hormonas->LH = $request->input('LH');
        $hormonas->FSH = $request->input('FSH');
        $hormonas->testosterona = $request->input('testosterona');
        $hormonas->testosteronaTotal = $request->input('testosteronaTotal');
        $hormonas->testosteronaLibre = $request->input('testosteronaLibre');
        $hormonas->HDeCrecimiento = $request->input('HDeCrecimiento');
        $hormonas->HDeCrecimientoPostEjercicio = $request->input('HDeCrecimientoPostEjercicio');
        $hormonas->insulina = $request->input('insulina');
        $hormonas->AcAntiTP0 = $request->input('AcAntiTP0');
        $hormonas->DHEA = $request->input('DHEA');
        $hormonas->DHEAS = $request->input('DHEAS');
        $hormonas->TPH = $request->input('TPH');
        $hormonas->OHPPRG = $request->input('OHPPRG');
        $hormonas->antiCCP = $request->input('antiCCP');
        $hormonas->gastrina = $request->input('gastrina');
        $hormonas->aldosterona = $request->input('aldosterona');
        $hormonas->HParatiroidea = $request->input('HParatiroidea');
        $hormonas->antAntitiroglobulinaTG = $request->input('antAntitiroglobulinaTG');
        $hormonas->acVanilMandelico = $request->input('acVanilMandelico');
        $hormonas->IGFISomatomedina = $request->input('IGFISomatomedina');
        $hormonas->IGFBP3 = $request->input('IGFBP3');
        $hormonas->insulinaPostPand = $request->input('insulinaPostPand');
        $hormonas->idAnalisis = $request->input('idAnalisis');
        $hormonas->save();
        $analisis = Analisis::find($request->input('idAnalisis'));
        $analisis->estado = 'Realizado';
        $analisis->idBioquimico = $request->input('idbioquimico');
        $analisis->save();

        $this->crearNotificacion($analisis->orden->paciente->id, $analisis->id);  // esta linea de codigo tengo que meter para crear la notificacion al paciente
        activity()
        ->causedBy(auth()->user())
        ->withProperties(request()->ip()) // Obtener la dirección IP del usuario
        ->log('agrego una hormona');
    session()->flash('success', 'Se registró exitosamente');
        return redirect()->route('analisis.index')->with('success', '¡Se ha registrado exitosamente!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analisis $analisis)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Analisis $analisis)
    {
        activity()
        ->causedBy(auth()->user())
        ->withProperties(request()->ip()) // Obtener la dirección IP del usuario
        ->log('elimino un analisis');
    session()->flash('success', 'Se registró exitosamente');
        $analisis->delete();
        return redirect()->route('analisis.index')->with('success', 'Eliminado correctamente');
    }
}
