<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\Orden;
use App\Models\Analisis;
use App\Models\TipoAnalisis;

class AnalisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un paciente
        $paciente = new Paciente();
        $paciente->ci = '1234567';
        $paciente->nombre = 'Nombre del paciente';
        $paciente->sexo = 'Masculino';
        $paciente->correo = 'correo@ejemplo.com';
        $paciente->telefono = '123456789';
        $paciente->fechaNacimiento = '1990-01-01';
        $paciente->idTipoSeguro = 1; // Asigna el ID del tipo de seguro correspondiente
        $paciente->save();

        // Crear una orden para el paciente
        $orden = new Orden();
        $orden->idPaciente = $paciente->id;
        $orden->save();

        // Asignar número de orden
        $orden->nroOrden = 'OR' . $orden->id;
        $orden->save();

        // Tipos de análisis a incluir en la orden (suponiendo que tienes un array de IDs de tipos de análisis)
        $tipoAnalisisIds = [1, 2]; // Ejemplo de IDs de tipos de análisis

        // Iterar sobre los tipos de análisis y crear análisis para la orden
        foreach ($tipoAnalisisIds as $tipoAnalisisId) {
            // Insertar en la tabla intermedia
            DB::table('orden_analisis')->insert([
                'orden_id' => $orden->id,
                'tipo_analisis_id' => $tipoAnalisisId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Obtener el nombre del tipo de análisis utilizando el ID
            $tipoAnalisis = TipoAnalisis::find($tipoAnalisisId);

            // Crear un nuevo análisis para la orden
            $analisis = new Analisis();
            $analisis->estado = 'Pendiente';
            $analisis->descripcion = $tipoAnalisis->nombre; // Acceder al nombre del tipo de análisis
            $analisis->idOrden = $orden->id;
            $analisis->save();
        }

        $this->command->info('¡Datos de análisis generados exitosamente!');
    }
}