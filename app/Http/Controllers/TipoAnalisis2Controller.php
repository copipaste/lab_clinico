<?php

namespace App\Http\Controllers;

use App\Models\tipo_analisis2;
use Illuminate\Http\Request;

class TipoAnalisis2Controller extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tipoanalisis = tipo_analisis2::all();
        return view('VistaTiposAnalisis.index', compact('tipoanalisis'));
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
          $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        // Crear una nueva instancia del modelo TipoSeguro
        $tipoanalisis = new tipo_analisis2();

        // Asignar los valores del formulario a las propiedades del modelo
        $tipoanalisis->nombre = $request->nombre;
        $tipoanalisis->descripcion = $request->descripcion;
        $tipoanalisis->precio = $request->precio;

        // Guardar el tipo de seguro en la base de datos
        $tipoanalisis->save();

        // Redirigir a la página de índice de tipos de seguro con un mensaje de éxito
        return redirect()->route('tipoanalisis.index')->with('success', '¡El tipo de seguro se ha registrado exitosamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(tipo_analisis2 $tipoAnalisis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_analisis2 $tipoanalisis)
    {
        return view('VistaTiposAnalisis.edit', compact('tipoanalisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipo_analisis2 $tipoanalisis)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);
        $tipoanalisis = new tipo_analisis2();

        // Actualizar los datos del tipo de seguro
        $tipoanalisis->nombre = $request->nombre;
        $tipoanalisis->descripcion = $request->descripcion;
        $tipoanalisis->precio = $request->precio;
        $tipoanalisis->save();

        // Redirigir a la página de índice de tipos de seguro con un mensaje de éxito
        return redirect()->route('tipoanalisis.index')->with('success', 'Los datos del tipo de seguro han sido actualizados correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipo_analisis2 $tipoanalisis)
    {
        $tipoanalisis->delete();
        return redirect()->route('tipoanalisis.index')->with('success', 'Eliminado correctamente');

    }
}
