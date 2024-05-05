<?php

namespace App\Http\Controllers;

use App\Models\Hormonas;
use Illuminate\Http\Request;

class HormonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Id',
            'Bioquimico',
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
    public function show(Hormonas $hormonas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hormonas $hormonas)
    {
        //
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
