<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoanalisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hemograma',
            'descripcion' => 'General',
            'precio' => 50.00,
            'tipo'=>'Hemograma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hemograma2',
            'descripcion' => 'General',
            'precio' => 50.00,
            'tipo'=>'Hemograma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hemograma3',
            'descripcion' => 'General',
            'precio' => 50.00,
            'tipo'=>'Hemograma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hormona',
            'descripcion' => 'General',
            'precio' => 100.00,
            'tipo'=>'Hormona',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Quimica',
            'descripcion' => 'General',
            'precio' => 80.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Orina',
            'descripcion' => 'General',
            'precio' => 30.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

