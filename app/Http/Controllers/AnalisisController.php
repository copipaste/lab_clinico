<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Analisis',
            'Fecha',
            'Orden',
            'Bioquimico',
            ['label' => 'Acciones', 'no-export' => true],
        ];

        $analisis = Analisis::all();
        return view('Analisis.index', compact('analisis', 'heads'));
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
           // Crear una nueva instancia del modelo TipoSeguro
           $analisis = new Analisis();

           // Asignar los valores del formulario a las propiedades del modelo
           $analisis->fecha = $request->fecha;
           $analisis->idOrden = $request->idOrden;
           $analisis->idBioquimico = $request->idBioquimico;

           // dd($request->nroOrden);
            $analisis->save();

           return redirect()->route('orden.index')->with('success', '¡Se ha registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Analisis $analisis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analisis $analisis)
    {
        return view('analisis.view', compact('analisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        request()->validate([
            'descripcion' => 'required|string|max:255',
            'descuento' => 'required|numeric',
        ]);
        $analisis = Analisis::findOrFail($id);
        $analisis ->update($request->all());
        // Redirigir a la página de índice de tipos de seguro con un mensaje de éxito
        return redirect()->route('analisis.index')->with('success', 'Analisis han sido actualizados correctamente.');
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
