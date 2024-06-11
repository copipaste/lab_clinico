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

        // Crear una orden para el paciente 1 jHOEL DEBRAY
        // ID ORDEN 2
        $orden = new Orden();
        $orden->idPaciente = 1;     //EL PACIENTE CON ID 1 ES jHOEL DEBRAY
        $orden->save();

        // Asignar número de orden
        $orden->nroOrden = 'OR' . $orden->id;
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

        // Crear un nuevo análisis para la orden ID 2
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = 'Hemograma';
        $analisis->idOrden = $orden->id;    // Orden ID 2
        $analisis->save();

        // Crear un nuevo análisis para la orden ID 2
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = 'Hormona';
        $analisis->idOrden = $orden->id;    // Orden ID 2
        $analisis->save();

        // ID ORDEN 3
        $orden2 = new Orden();
        $orden2->idPaciente = 1;    // Paciente ID 1 Jhoel Debray
        $orden2->save();

        // Asignar número de orden
        $orden2->nroOrden = 'OR' . $orden2->id;
        $orden2->save();


        ordenAnalisis::create([
            'orden_id' => $orden2->id,
            'tipo_analisis_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear un nuevo análisis para la orden ID 3
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = 'Hemograma';
        $analisis->idOrden = $orden2->id;   // Orden ID 3
        $analisis->save();
    }
}
