<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\Orden;
use App\Models\Analisis;
use App\Models\NotaVenta;
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
        // Crear la nota de venta
        $notaventa1 = NotaVenta::create([
            'metodoPago' => 'Paypal',
            'precio' => 150,
            'descuento' => 0,
            'precioTotal' => 150,
        ]);

        // ID ORDEN 2
        $orden = new Orden();
        $orden->idNotaVenta = $notaventa1->id;
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


        // NUEVA ORDEN
        // Crear la nota de venta
        $notaventa2 = NotaVenta::create([
            'metodoPago' => 'Paypal',
            'precio' => 50,
            'descuento' => 0,
            'precioTotal' => 50,
        ]);

        // ID ORDEN 3
        $orden2 = new Orden();
        $orden2->idNotaVenta = $notaventa2->id;
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




        // ID ORDEN 4
        $orden3 = new Orden();
        $orden3->idNotaVenta = $notaventa2->id;
        $orden3->idPaciente = 1;    // Paciente ID 1 Jhoel Debray
        $orden3->save();

        // Asignar número de orden
        $orden3->nroOrden = 'OR' . $orden3->id;
        $orden3->save();

        ordenAnalisis::create([
            'orden_id' => $orden3->id,
            'tipo_analisis_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear un nuevo análisis para la orden ID 4
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = 'Quimica';
        $analisis->idOrden = $orden3->id;   // Orden ID 4
        $analisis->save();

        ordenAnalisis::create([
            'orden_id' => $orden3->id,
            'tipo_analisis_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear un nuevo análisis para la orden ID 4
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = 'Orina';
        $analisis->idOrden = $orden3->id;   // Orden ID 4
        $analisis->save();
    }
}
