<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoAnalisis; // Importa el modelo TipoAnalisis

class TipoanalisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAnalisis::create([
            'nombre' => 'Hemograma',
            'descripcion' => 'General',
            'precio' => 50.00,
            'tipo' => 'Hemograma',
        ]);

        TipoAnalisis::create([
            'nombre' => 'Hormona',
            'descripcion' => 'General',
            'precio' => 100.00,
            'tipo' => 'Hormona',
        ]);

        TipoAnalisis::create([
            'nombre' => 'Quimica',
            'descripcion' => 'General',
            'precio' => 80.00,
            'tipo' => 'Quimica',
        ]);

        TipoAnalisis::create([
            'nombre' => 'Orina',
            'descripcion' => 'General',
            'precio' => 30.00,
            'tipo' => 'Orina',
        ]);
    }
}


