<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(superUserSeeder::class);
        $this->call(TipoanalisisSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(AnalisisSeeder::class);
        $this->call(HemogramaSeeder::class);
        $this->call(HormonaSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(OrdenSeeder::class);




        //USER ID 8
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password'=>'12345678'
        ]);

    }
}
