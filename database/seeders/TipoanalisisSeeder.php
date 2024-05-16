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
            'nombre' => 'Hemograma',
            'descripcion' => 'Análisis de sangre completo para evaluar diferentes componentes de la sangre.',
            'precio' => 50.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Perfil Lipídico',
            'descripcion' => 'Análisis para medir el nivel de grasas y lípidos en la sangre.',
            'precio' => 80.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Glucosa en Ayunas',
            'descripcion' => 'Prueba de glucosa en sangre para detectar diabetes.',
            'precio' => 40.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Urea y Creatinina',
            'descripcion' => 'Análisis para evaluar la función renal.',
            'precio' => 60.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'TGO/TGP',
            'descripcion' => 'Análisis de enzimas hepáticas para evaluar la función del hígado.',
            'precio' => 70.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Perfil Tiroideo',
            'descripcion' => 'Análisis para evaluar la función de la glándula tiroides.',
            'precio' => 120.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Hormona',
            'descripcion' => 'Análisis de hormonas para evaluar el equilibrio hormonal.',
            'precio' => 100.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Ácido Úrico',
            'descripcion' => 'Prueba para medir los niveles de ácido úrico en la sangre.',
            'precio' => 55.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Orina Completa',
            'descripcion' => 'Análisis completo de orina para detectar enfermedades y condiciones.',
            'precio' => 45.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Cultivo de Orina',
            'descripcion' => 'Prueba para detectar infecciones del tracto urinario.',
            'precio' => 65.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Test de Embarazo',
            'descripcion' => 'Análisis de sangre para detectar embarazo.',
            'precio' => 30.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Electrolitos',
            'descripcion' => 'Análisis de electrolitos en sangre para evaluar el balance de líquidos y minerales.',
            'precio' => 75.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Proteínas Totales',
            'descripcion' => 'Análisis para medir los niveles de proteínas en la sangre.',
            'precio' => 50.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Prueba de VIH',
            'descripcion' => 'Análisis de sangre para detectar el virus del VIH.',
            'precio' => 100.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Coagulación',
            'descripcion' => 'Análisis para evaluar la capacidad de coagulación de la sangre.',
            'precio' => 85.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_analisis')->insert([
            'nombre' => 'Microbiología',
            'descripcion' => 'Cultivos y pruebas para detectar infecciones bacterianas.',
            'precio' => 90.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DB::table('tipo_analisis')->insert([
        //     'nombre' => 'Quimica Sanguinea',
        //     'descripcion' => 'General',
        //     'precio' => 30.00,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('tipo_analisis')->insert([
        //     'nombre' => 'Parasitologia Simple',
        //     'descripcion' => 'General',
        //     'precio' => 40.00,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('tipo_analisis')->insert([
        //     'nombre' => 'Orina Completa',
        //     'descripcion' => 'General',
        //     'precio' => 60.00,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('tipo_analisis')->insert([
        //     'nombre' => 'Reaccion de Widal',
        //     'descripcion' => 'General',
        //     'precio' => 60.00,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Agrega más datos según sea necesario
    }
}

