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
        Schema::create('hemograma_completos', function (Blueprint $table) {
            $table->id();
            $table->integer('globulosRojos');
            $table->float('hematocrito');
            $table->float('hemoglobina');
            $table->float('VCM');
            $table->float('HCM');
            $table->float('CHCM');
            $table->integer('VSG');
            $table->integer('plaquetas');
            $table->integer('recuento');
            $table->integer('globulosBlancos');
            $table->integer('promielocitos');
            $table->integer('mielocitos');
            $table->integer('metamielocitos');
            $table->integer('cayados');
            $table->integer('segmentados');
            $table->integer('linfocitos');
            $table->integer('monocitos');
            $table->integer('eosinofilos');
            $table->integer('basofilos');
            $table->integer('blastos');
            $table->string('grupoSanguineo')->nullable();
            $table->string('factorRh')->nullable();
            $table->decimal('precio', 10, 2);
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('idAnalisis');
            $table->foreign('idAnalisis')->references('id')->on('analisis')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hemograma_completos');
    }
};
