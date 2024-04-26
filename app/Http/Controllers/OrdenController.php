<?php

namespace App\Http\Controllers;

use App\Models\Orden;
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
            'Nro',
            'Tipo Analisis',
            'Id Solicitud',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $orden = orden::all();
        return view('orden.index', compact('orden','heads'));


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

          // Validar los datos del formulario
        //   $request->validate([
        //     'nroOrden' => 'required|string|max:255',
        //     'idTipoAnalisis' => 'required|exists:tipo_analisis,id',
        //     'idSolicitud' => 'nullable|exists:solicitudes,id',
        // ]);


        // Crear una nueva instancia del modelo TipoSeguro
        $orden = new Orden();

        // Asignar los valores del formulario a las propiedades del modelo
        $orden->nroOrden = $request->nroOrden;
        $orden->idTipoAnalisis = $request->idTipoAnalisis;
        // $orden->idSolicitud = $request->idSolicitud;

        // dd($request->nroOrden);
            $orden->save();

        return redirect()->route('orden.index')->with('success', '¡El tipo de seguro se ha registrado exitosamente!');
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
