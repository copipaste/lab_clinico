<?php

namespace App\Http\Controllers;

use App\Models\HemogramaCompleto;
use Illuminate\Http\Request;

class HemogramaCompletoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
      

<<<<<<< Updated upstream
        // Crear un nuevo registro de hemograma completo
        $hemograma = new HemogramaCompleto();

        // Asignar los valores de los campos del formulario al modelo
        $hemograma->globulosRojos = $request->input('globulosRojos');

        // Guardar el nuevo registro en la base de datos
        $hemograma->save();

        activity()
        ->causedBy(auth()->user())
        ->withProperties(request()->ip()) // Obtener la dirección IP del usuario
        ->log('Registro un hemograma con el nombre: ' . $hemograma->globulosRojos);
    session()->flash('success', 'Se registró exitosamente');
        return redirect()->route('anlisis.index')->with('success', '¡Se ha registrado exitosamente!');

=======
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     */
    public function show(HemogramaCompleto $hemogramaCompleto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HemogramaCompleto $hemogramaCompleto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HemogramaCompleto $hemogramaCompleto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HemogramaCompleto $hemogramaCompleto)
    {
        //
    }
}
