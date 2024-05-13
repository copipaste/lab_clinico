<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Bioquimico;
use App\Models\HemogramaCompleto;
use Illuminate\Http\Request;

class HemogramaCompletoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Orden',
            'Id',
            'Bioquimico',
            'Paciente',
            'Fecha',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $hemograma = HemogramaCompleto::all();
        return view('hemograma.index', compact('hemograma', 'heads'));
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
    public function edit(HemogramaCompleto $hemograma)
    {
        $bioquimico= Bioquimico::all();
        return view('hemograma.edit', compact('hemograma','bioquimico'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hemograma = HemogramaCompleto::findOrFail($id);

        // Actualizar los glóbulos rojos del hemograma
        $hemograma->update([
            'globulosRojos' => $request->globulosrojos
        ]);

        // Obtener el análisis asociado al hemograma
        $analisis = $hemograma->analisis;

        // Actualizar el bioquímico del análisis
        $analisis->update([
            'idBioquimico' => $request->idbioquimico
        ]);

        return redirect()->route('hemograma.index')->with('success', 'Los datos han sido actualizados correctamente.');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HemogramaCompleto $hemogramaCompleto)
    {
        //
    }
}
