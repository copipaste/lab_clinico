<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\Orden;
use App\Models\Analisis;
use App\Models\ordenAnalisis;
use App\Models\TipoAnalisis;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Crear una orden para el paciente 2 jHOEL DEBRAY
        $orden = new Orden();
        $orden->nroOrden = 'OR3';
        $orden->idPaciente = 2;
        $orden->save();

        ordenAnalisis::create([
            'orden_id' => $orden->id,
            'tipo_analisis_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        ordenAnalisis::create([
            'orden_id' => $orden->id,
            'tipo_analisis_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $orden2 = new Orden();
        $orden2->nroOrden = 'OR4';
        $orden2->idPaciente = 2;
        $orden2->save();

        ordenAnalisis::create([
            'orden_id' => $orden2->id,
            'tipo_analisis_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
