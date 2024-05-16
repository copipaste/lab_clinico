<?php

namespace App\Http\Controllers;
use App\Models\Bioquimico;
use App\Models\Hormonas;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notificacion;

class HormonasController extends Controller
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
        $hormonas = Hormonas::all();
        return view('hormona.index', compact('hormonas', 'heads'));
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
    public function show(Hormonas $hormona)
    {
        $bioquimico= Bioquimico::all();

        //! codigo jhoel
        $user = User::find(auth()->user()->id);
        if( $user->hasRole('Paciente') ){
            $notificacion = Notificacion::where('analisisId', $hormona->idAnalisis)->first();
            if($user->paciente->id == $notificacion->pacienteId){
                $notificacion->read = 1;
                $notificacion->save();
            }
        }
         //! codigo jhoel


        return view('hormona.show', compact('hormona','bioquimico'));
    }
    public function show2(string $id)
    {
        $heads = [
            'Orden',
            'Id',
            'Bioquimico',
            'Paciente',
            'Fecha',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $hormonas = Hormonas::all();
        return view('hormona.index', compact('hormonas', 'heads','id'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hormonas $hormona)
    {
        $bioquimico= Bioquimico::all();
        return view('hormona.edit', compact('hormona','bioquimico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hormonas $hormonas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hormonas $hormonas)
    {
        //
    }
}
