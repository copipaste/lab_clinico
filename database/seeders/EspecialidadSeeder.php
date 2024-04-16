<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = Especialidad::create([
            'nombre' => 'Especialidad 1',
            'descripcion' => 'Cosas importantes',

        ]);
    }
}
