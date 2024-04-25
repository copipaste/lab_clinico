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
        $analisis = Analisis::all();
        return view('Analisis.index', compact('analisis'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Analisis $analisis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Analisis $analisis)
    {
        //
    }
}
