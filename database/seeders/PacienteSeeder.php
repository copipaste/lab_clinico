<?php

namespace Database\Seeders;

use App\Models\Historial;
use App\Models\TipoSeguro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user1 = User::create([
            'name' => 'paciente1',
            'email' => 'paciente101@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');
        $user2 = User::create([
            'name' => 'paciente2',
            'email' => 'paciente102@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Paciente');

        $historial1 = Historial::create([
            'nroHistoria' => 'P-1',
            'fechaRegistro' => '2021-01-01',
            'antecedentesPatologicos' => 'ninguno',
        ]);
        
        $historial2 = Historial::create([
            'nroHistoria' => 'P-2',
            'fechaRegistro' => '2021-01-01',
            'antecedentesPatologicos' => 'ninguno',
        ]);

        $tiposeguro1 = TipoSeguro::create([
            'descripcion' => 'Seguro1',
            'descuento' => 0,
        ]);
        $tiposeguro2 = TipoSeguro::create([
            'descripcion' => 'Seguro2',
            'descuento' => 100,
        ]);

        Paciente::create([
            'ci' => '123456',
            'nombre' => 'Lourdes Garcia',
            'fechaNacimiento' => '1990-01-01',
            'sexo' => 'FEMENINO',
            'telefono' => '70016993',
            'idTipoSeguro' => $tiposeguro1->id,
            'idHistorial' => $historial1->id,
            'idUser' => $user1->id,
        ]);

        Paciente::create([
            'ci' => '654321',
            'nombre' => 'Marco Lopez',
            'fechaNacimiento' => '1990-01-02',
            'sexo' => 'MASCULINO',
            'telefono' => '60960799',
            'idTipoSeguro' => $tiposeguro2->id,
            'idHistorial' => $historial2->id,
            'idUser' => $user2->id,
        ]);
    }
}
