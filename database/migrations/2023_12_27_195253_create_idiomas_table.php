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
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string('institucion');
            $table->string('idioma', 30);
            $table->string('grado_dominio', 30);
            $table->string('nivel_conversacion', 30);
            $table->string('nivel_lectura');
            $table->string('nivel_escritura');
            $table->boolean('certificacion');
            $table->date('fecha_evaluacion');
            $table->string('documento_probatorio', 30);
            $table->date('vigencia_de');
            $table->date('vigencia_a');
            $table->bigInteger('puntos');
            $table->string('nivel');
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
    }
};
