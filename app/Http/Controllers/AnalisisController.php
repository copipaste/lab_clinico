<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\HemogramaCompleto;
use App\Models\Bioquimico;
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

        return redirect()->route('analisis.index')->with('success', '¡Se ha registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    public function hemograma($id)
    {
        $analisis = Analisis::findOrFail($id);
        // Obtener datos relacionados
        $idOrden = $analisis->orden->id;
        // $nombrePaciente = $analisis->orden->paciente->nombre; // Asumiendo que tienes la relación definida
        // $nombreSeguro = $analisis->orden->paciente->tipoSeguro->descripcion; // Asumiendo que tienes la relación definida
        $bioquimico = Bioquimico::all();
        return view('analisis.hemograma', compact('analisis', 'idOrden','bioquimico'));
    }

    public function hemogramastore(Request $request)
    {
        // // Validación de los datos del formulario
        // $validatedData = $request->validate([
        //     // Definir reglas de validación para cada campo
        // ]);

        // Crear un nuevo registro de hemograma completo
        $hemograma = new HemogramaCompleto();

        // Asignar los valores de los campos del formulario al modelo
        $hemograma->globulosRojos = $request->input('globulosrojo');
        $hemograma->idAnalisis = $request->input('idAnalisis');
        // dd( $hemograma->globulosRojos);
        // Guardar el nuevo registro en la base de datos
        $hemograma->save();
        return redirect()->route('analisis.index')->with('success', '¡Se ha registrado exitosamente!');
    }

    public function hemogramaupdate(Request $request)
    {
        // Obtener el ID del análisis del formulario
        $idAnalisis = $request->input('idAnalisis');

        // Buscar el hemograma asociado al análisis
        $hemograma = HemogramaCompleto::where('idAnalisis', $idAnalisis)->first();

        // Verificar si se encontró el hemograma
        if ($hemograma) {
            // Si se encontró, actualizar los campos del hemograma con los valores del formulario
            $hemograma->globulosRojos = $request->input('globulosrojo');
            // Guardar los cambios en la base de datos
            $hemograma->save();

            // Redirigir a la página de índice con un mensaje de éxito
            return redirect()->route('analisis.index')->with('success', '¡Se ha actualizado exitosamente!');
        } else {
            // Si no se encontró el hemograma, mostrar un mensaje de error
            return redirect()->route('analisis.index')->with('error', '¡No se encontró el hemograma para actualizar!');
        }
    }


    public function hormona($id)
    {
        $analisis = Analisis::findOrFail($id);
        // Obtener datos relacionados
        $nroOrden = $analisis->orden->nroOrden;
        // $nombrePaciente = $analisis->orden->paciente->nomwbre; // Asumiendo que tienes la relación definida
        // $nombreSeguro = $analisis->orden->paciente->tipoSeguro->descripcion; // Asumiendo que tienes la relación definida
        $bioquimico = Bioquimico::all();
        return view('analisis.hormona', compact('analisis', 'nroOrden','bioquimico'));
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
        $analisis->update($request->all());
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
