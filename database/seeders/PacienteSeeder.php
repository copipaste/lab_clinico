<?php

namespace Database\Seeders;

use App\Models\Bioquimico;
use App\Models\Historial;
use App\Models\TipoSeguro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Registro;
use App\Models\Especialidad;
use App\Models\NotaVenta;
use App\Models\Orden;
use App\Models\TipoAnalisis;
use Illuminate\Support\Facades\DB;
use App\Models\Analisis;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID USER 2
        $user1 = User::create([
            'name' => 'Jhoel Debray 1',
            'email' => 'paciente1@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');

        // ID USER 3 
        $user2 = User::create([
            'name' => 'Manuel medrano 2',
            'email' => 'paciente2@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');

        // ID USER 4 
        $user3 = User::create([
            'name' => 'Carla Zapata 3',
            'email' => 'paciente3@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');

        // ID USER 5
        $user4 = User::create([
            'name' => 'Tania Valdez 4',
            'email' => 'paciente4@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');
       
        // ID USER 6
        $user5 = User::create([
            'name' => 'Dr. Juan Perez 1',
            'email' => 'bioquimico1@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Bioquimico');




        $historial1 = Historial::create([
            'nroHistoria' => 'H-1',
            'fechaRegistro' => '2021-01-01',
            'antecedentesPatologicos' => 'ninguno',
        ]);

        $historial2 = Historial::create([
            'nroHistoria' => 'H-2',
            'fechaRegistro' => '2021-02-02',
            'antecedentesPatologicos' => 'ninguno',
        ]);

        $historial3 = Historial::create([
            'nroHistoria' => 'H-3',
            'fechaRegistro' => '2021-03-03',
            'antecedentesPatologicos' => 'ninguno',
        ]);

        $historial4 = Historial::create([
            'nroHistoria' => 'H-4',
            'fechaRegistro' => '2021-04-04',
            'antecedentesPatologicos' => 'ninguno',
        ]);

        $tiposeguro1 = TipoSeguro::create([
            'descripcion' => 'Caja Petrolera',
            'descuento' => 50,
        ]);
        $tiposeguro2 = TipoSeguro::create([
            'descripcion' => 'CNS',
            'descuento' => 100,
        ]);
        $tiposeguro3 = TipoSeguro::create([
            'descripcion' => 'SEGURO PRIVADO',
            'descuento' => 100,
        ]);





        // PACIENTE ID 1
        Paciente::create([
            'ci' => '123456',
            'nombre' => 'Jhoel Debray 1',
            'fechaNacimiento' => '1990-01-01',
            'sexo' => 'MASCULINO',
            'telefono' => '70016993',
            'idTipoSeguro' => $tiposeguro1->id,
            'idHistorial' => $historial1->id,
            'idUser' => $user1->id,     //idUser 2
        ]);

        // PACIENTE ID 2
        Paciente::create([
            'ci' => '654321',
            'nombre' => 'Manuel medrano 2',
            'fechaNacimiento' => '1990-01-02',
            'sexo' => 'MASCULINO',
            'telefono' => '60960799',
            'idTipoSeguro' => $tiposeguro1->id,
            'idHistorial' => $historial2->id,
            'idUser' => $user2->id,     //idUser 3
        ]);

        // PACIENTE ID 3
        Paciente::create([
            'ci' => '123426',
            'nombre' => 'Carla Zapata 3',
            'fechaNacimiento' => '1990-01-01',
            'sexo' => 'FEMENINO',
            'telefono' => '70016993',
            'idTipoSeguro' => $tiposeguro3->id,
            'idHistorial' => $historial3->id,
            'idUser' => $user3->id,     //idUser 4
        ]);


        // PACIENTE ID 4
        

        $paciente4 = Paciente::create([

            'ci' => '654321',
            'nombre' => 'Tania Valdez 4',
            'fechaNacimiento' => '1990-01-02',
            'sexo' => 'FEMENINO',
            'telefono' => '60960799',
            'idTipoSeguro' => $tiposeguro2->id,
            'idHistorial' => $historial4->id,
            'idUser' => $user4->id,     //idUser 5
        ]);

        $especialidad = Especialidad::create([
            'nombre' => 'Bioquimica', // 'nombre' => 'Bioquimica
            'descripcion' => 'Bioquimica',
        ]);

        // BIOQUÍMICO NO RELACIONADO A NINGÚN USER
        $bioquimico = Bioquimico::create([
            'ci' => '123456',
            'direccion' => 'av. 6 de agosto',
            'nombre' => 'Juan Perez 1',
            'fechaNacimiento' => '1990-01-01',
            'sexo' => 'MASCULINO',
            'telefono' => '70016993',
            'idEspecialidad' => $especialidad->id,
        ]);


        Registro::create([

            'tipo_analisis' => 'QUIMICA SANGUINEA',
            'fecha' => '2021-01-01',
            'doctor' => 'Dr. Juan Perez',
            'precion_arterial' => '120/80 mmHg',
            'peso' => '75',
            'altura' => '170',
            'notas' => 'El analisis resulto normal sin ninguna anomalia',
            'idBioquimico' => $bioquimico->id,
            'idHistorial' => $historial1->id
        ]);

        Registro::create([

            'tipo_analisis' => 'HEMOGRAMA COMPLETO',
            'fecha' => '2021-02-02',
            'doctor' => 'Dr. Juan Perez',
            'precion_arterial' => '110/80 mmHg',
            'peso' => '75',
            'altura' => '170',
            'notas' => 'ninguna',
            'idBioquimico' => $bioquimico->id,
            'idHistorial' => $historial1->id
        ]);

        Registro::create([

            'tipo_analisis' => 'QUIMICA SANGUINEA',
            'fecha' => '2021-03-03',
            'doctor' => 'Dr. Juan Perez',
            'precion_arterial' => '120/80 mmHg',
            'peso' => '75',
            'altura' => '170',
            'notas' => 'ninguna',
            'idBioquimico' => $bioquimico->id,
            'idHistorial' => $historial1->id
        ]);

        Registro::create([

            'tipo_analisis' => 'HEMOGRAMA COMPLETO',
            'fecha' => '2021-04-04',
            'doctor' => 'Dr. Juan Perez',
            'precion_arterial' => '100/70 mmHg',
            'peso' => '70',
            'altura' => '174',
            'notas' => 'el paciente tiene una anomalia en la cantidad de plaquetas',
            'idBioquimico' => $bioquimico->id,
            'idHistorial' => $historial1->id
        ]);


        $nota1 = NotaVenta::create([
            'metodoPago' => 'Efectivo',
            'precio' => 100,
            'descuento' => 0,
            'precioTotal' => 100,
            'created_at' => '2024-06-10',
        ]);

        $nota2 = NotaVenta::create([
            'metodoPago' => 'Tarjeta',
            'precio' => 100,
            'descuento' => 0,
            'precioTotal' => 100,
            'created_at' => '2024-06-10',
        ]);

        $nota3 = NotaVenta::create([
            'metodoPago' => 'Efectivo',
            'precio' => 100,
            'descuento' => 0,
            'precioTotal' => 100,
            'created_at' => '2024-05-03',
        ]);

        $nota4 = NotaVenta::create([
            'metodoPago' => 'Tarjeta',
            'precio' => 100,
            'descuento' => 0,
            'precioTotal' => 100,
            'created_at' => '2024-05-04',
        ]);


        $orden1 = Orden::create([
            'nroOrden' => 'OR-31',
            'estado' => 'en proceso',
            'idPaciente' => $paciente4->id,
            'idNotaVenta' => $nota1->id,
        ]);

        $orden2 = Orden::create([
            'nroOrden' => 'OR-32',
            'estado' => 'en proceso',
            'idPaciente' => $paciente4->id,
            'idNotaVenta' => $nota2->id,
        ]);

        $orden3 = Orden::create([
            'nroOrden' => 'OR-33',
            'estado' => 'en proceso',
            'idPaciente' => $paciente4->id,
            'idNotaVenta' => $nota3->id,
        ]);

        $orden4 = Orden::create([
            'nroOrden' => 'OR-34',
            'estado' => 'en proceso',
            'idPaciente' => $paciente4->id,
            'idNotaVenta' => $nota4->id,
        ]);

        $tipoAnalisis = TipoAnalisis::where('nombre', 'Hemograma')->first();

        DB::table('orden_analisis')->insert([
            'orden_id' => $orden1->id,
            'tipo_analisis_id' => $tipoAnalisis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        DB::table('orden_analisis')->insert([
            'orden_id' => $orden2->id,
            'tipo_analisis_id' => $tipoAnalisis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orden_analisis')->insert([
            'orden_id' => $orden3->id,
            'tipo_analisis_id' => $tipoAnalisis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orden_analisis')->insert([
            'orden_id' => $orden4->id,
            'tipo_analisis_id' => $tipoAnalisis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = $tipoAnalisis->nombre; // Acceder al nombre del tipo de análisis
        $analisis->idOrden = $orden1->id;
        $analisis->save();
        
        
        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = $tipoAnalisis->nombre; // Acceder al nombre del tipo de análisis
        $analisis->idOrden = $orden2->id;
        $analisis->save();

        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = $tipoAnalisis->nombre; // Acceder al nombre del tipo de análisis
        $analisis->idOrden = $orden3->id;
        $analisis->save();

        $analisis = new Analisis();
        $analisis->estado = 'Pendiente';
        $analisis->descripcion = $tipoAnalisis->nombre; // Acceder al nombre del tipo de análisis
        $analisis->idOrden = $orden4->id;
        $analisis->save();


        $this->command->info('¡Datos creados exitosamente jhoel!');




    }
}
