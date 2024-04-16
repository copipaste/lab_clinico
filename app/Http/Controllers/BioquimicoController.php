<?php

namespace App\Http\Controllers;
use App\Models\Especialidad;
use App\Models\Bioquimico;
use Illuminate\Http\Request;
use App\Models\User;
class BioquimicoController extends Controller
{    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       $heads = [
           'ci',
           'direccion',
           'nombre',
           'fechaNacimiento',
           'sexo',
           'telefono',
           'idEspecialidad',
           ['label' => 'Acciones', 'no-export' => true],
       ];
       $Bioquimico = Bioquimico::all();
       $Especialidad = Especialidad::all();
       // $Bioquimicos->each(function ($Bioquimico) {
       //     $Bioquimico->tipoSeguro = $Bioquimico->tipoSeguro->descripcion;
       // });
       // dd($Bioquimicos);
       return view('bioquimicos.index', compact('Bioquimico', 'heads', 'Especialidad'));
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
       request()->validate([
           'ci' => 'required',
           'direccion'=> 'required',
           'nombre'=> 'required',
           'fechaNacimiento'=> 'required',
           'sexo'=> 'required',
           'telefono'=> 'required',
           'idEspecialidad'=> 'required',
       ]);

    //    $user = User::create([
    //        'name' => $request->nombre,
    //        'telefono' => $request->email,
    //        'password' => bcrypt($request->password),
    //    ]);

    //    $historial = new Historial();
    //    $historial->nroHistoria = $request->ci;
    //    $historial->fechaRegistro = date('Y-m-d');
    //    $historial->antecedentesPatologicos = 'Ninguno';
    //    $historial->save();

       $Bioquimico = new Bioquimico();
       $Bioquimico->ci = $request->ci;
       $Bioquimico->direccion = $request->direccion;
       $Bioquimico->nombre = $request->nombre;
       $Bioquimico->fechaNacimiento = $request->fechaNacimiento;
       $Bioquimico->sexo = $request->sexo;
       $Bioquimico->telefono = $request->telefono;
       $Bioquimico->idEspecialidad = $request->idEspecialidad;
       $Bioquimico->save();

       return redirect()->route('bioquimicos.index')->with('success', 'Bioquimico creado con éxito');
   }

   /**
    * Display the specified resource.
    */
   public function show(Bioquimico $Bioquimico)
   {
       return view('bioquimicos.show', compact('Bioquimico'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Bioquimico $Bioquimico)
   {
     $Especialidad = Especialidad::all();

     return view('bioquimicos.edit', compact('Bioquimico', 'Especialidad'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {

    request()->validate([
        'ci' => 'required',
        'direccion'=> 'required',
        'nombre'=> 'required',
        'fechaNacimiento'=> 'required',
        'sexo'=> 'required',
        'telefono'=> 'required',
        'idEspecialidad'=> 'required',
    ]);

       $Bioquimico = Bioquimico::findOrFail($id);

       $Bioquimico->update($request->all());


       return redirect()->route('bioquimicos.index')->with('success', 'Bioquimico actualizado con éxito');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Bioquimico $Bioquimico)
   {
       $id = $Bioquimico->idUser;
       $Bioquimico->delete();
       $user = User::findOrFail($id);
       $user->delete();
       return redirect()->route('bioquimicos.index')->with('deleted', 'Bioquimico eliminado con éxito');

   }
}
