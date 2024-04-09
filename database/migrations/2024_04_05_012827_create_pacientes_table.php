<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('nombre');
            $table->date('fechaNacimiento');
            $table->string('sexo');
            $table->string('telefono');
            $table->foreignId('idTipoSeguro')->constrained('tipo_seguros');
            $table->foreignId('idHistorial')->constrained('historiales');
            $table->foreignId('idUser')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
