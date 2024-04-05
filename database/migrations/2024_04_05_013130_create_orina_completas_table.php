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
        Schema::create('orina_completa', function (Blueprint $table) {
            $table->id();
            $table->integer('volumen');
            $table->string('color')->nullable();
            $table->string('aspecto')->nullable();
            $table->float('densidad')->nullable();
            $table->float('ph')->nullable();
            $table->string('olor')->nullable();
            $table->boolean('proteinas')->nullable();
            $table->boolean('glucosa')->nullable();
            $table->boolean('cetonas')->nullable();
            $table->boolean('urobilinogeno')->nullable();
            $table->boolean('hemoglobina')->nullable();
            $table->boolean('nitritos')->nullable();
            $table->boolean('bilirrubina')->nullable();
            $table->boolean('sangre')->nullable();
            $table->integer('celulasEpiteliales')->nullable();
            $table->integer('eritrocitos')->nullable();
            $table->integer('leucocitos')->nullable();
            $table->boolean('bacterias')->nullable();
            $table->boolean('filamentosDeMucus')->nullable();
            $table->boolean('cristalesUratosAmorfes')->nullable();
            $table->boolean('cristalesOxalatoDeCalcio')->nullable();
            $table->boolean('cristalesFosfatosAmorfos')->nullable();
            $table->boolean('cristalesDeAcidoUrico')->nullable();
            $table->boolean('cilindrosHialino')->nullable();
            $table->boolean('cilindrosGranuloso')->nullable();
            $table->boolean('cilindrosLeucocitario')->nullable();
            $table->boolean('levaduras')->nullable();
            $table->boolean('fosfTripleDeAmonioYMagnesio')->nullable();
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
        Schema::dropIfExists('orina_completa');
    }
};
