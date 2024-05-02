<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\TipoAnalisis;
use App\Models\Analisis;
use App\Models\Bioquimico;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Tipo Analisis',
            'Id Solicitud',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $orden = orden::all();
        $tipoanalisis = TipoAnalisis::all();
        $bioquimico = Bioquimico::all();
        return view('orden.index', compact('orden', 'tipoanalisis','bioquimico', 'heads'));
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
        $idOrden = $request->idOrden;
        if ($idOrden == null) { // Cambié = por ==
            $orden = new Orden();
            $orden->idTipoAnalisis = $request->idTipoAnalisis;
            $orden->save();
            $idOrden = $orden->id;
        }

        // Crear un nuevo análisis para la orden (ya sea existente o recién creada)
        $analisis = new Analisis();
        $analisis->fecha = $request->fecha;
        $analisis->idOrden = $idOrden; // Cambié $orden->id por $idOrden
        $analisis->idBioquimico = $request->idBioquimico;
        $analisis->estado = 'Pendiente';
        $analisis->save();
        

        activity()
            ->causedBy(auth()->user())
            ->withProperties(request()->ip()) // Obtener la dirección IP del usuario
            ->log('Se registró un análisis para la orden con el ID: ' . $idOrden); // Cambié $orden->id por $idOrden

        session()->flash('success', 'Se registró exitosamente');
        return redirect()->route('orden.index')->with('success', '¡El análisis se ha registrado exitosamente!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        $orden->delete();
        return redirect()->route('orden.index')->with('success', 'Eliminado correctamente');
    }
}
