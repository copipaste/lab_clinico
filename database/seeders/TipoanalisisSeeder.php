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
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hormona',
            'descripcion' => 'General',
            'precio' => 100.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

