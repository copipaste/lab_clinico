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

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Quimica Sanguinea',
            'descripcion' => 'General',
            'precio' => 30.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Parasitologia Simple',
            'descripcion' => 'General',
            'precio' => 40.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Orina Completa',
            'descripcion' => 'General',
            'precio' => 60.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_analisis')->insert([
            'nombre' => 'Reaccion de Widal',
            'descripcion' => 'General',
            'precio' => 60.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Agrega más datos según sea necesario
    }
}

