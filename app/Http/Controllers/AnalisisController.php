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
    {
        $heads = [
            'Orden',
            'Id',
            'Descripcion',
            'Paciente',
            'Estado',
            ['label' => 'Acciones', 'no-export' => true],
        ];

        $analisis = Analisis::all();
        $tipoanalisis = TipoAnalisis::all();
        return view('analisis.index', compact('analisis', 'tipoanalisis', 'heads'));
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
        $hemograma->blastos = $request->input('blastos');
        $hemograma->grupoSanguineo = $request->input('gruposanguineo');
        $hemograma->factorRh = $request->input('factorrh');
        $hemograma->descripcion = $request->input('descripcion');
        $hemograma->idAnalisis = $request->input('idAnalisis');
        $hemograma->save();
        $analisis = Analisis::find($request->input('idAnalisis'));
        $analisis->idBioquimico = $request->input('idbioquimico');
        $analisis->estado = 'Realizado';                             // -->>>> cambia el estado cuando el bioquimico realiza el analisis
        $analisis->save();

        $this->crearNotificacion($analisis->orden->paciente->id, $analisis->id); // esta linea de codigo tengo que meter para crear la notificacion al paciente
        


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

        $this->crearNotificacion($analisis->orden->paciente->id, $analisis->id);  // esta linea de codigo tengo que meter para crear la notificacion al paciente

        return view('analisis.hormona', compact('analisis', 'idOrden', 'bioquimico', 'nombrepaciente'));
    }

    public function hormonastore(Request $request)
    {
        // // Validación de los datos del formulario
        // $validatedData = $request->validate([
        //     // Definir reglas de validación para cada campo
        // ]);

        $hormonas = new Hormonas();
        $hormonas->TSH = $request->input('TSH');
        $hormonas->idAnalisis = $request->input('idAnalisis');
        $hormonas->save();
        $analisis = Analisis::find($request->input('idAnalisis'));
        $analisis->estado = 'Realizado';
        $analisis->idBioquimico = $request->input('idbioquimico');
        $analisis->save();

        $this->crearNotificacion($analisis->orden->paciente->id, $analisis->id);  // esta linea de codigo tengo que meter para crear la notificacion al paciente

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
        $analisis->delete();
        return redirect()->route('analisis.index')->with('success', 'Eliminado correctamente');
    }
}
