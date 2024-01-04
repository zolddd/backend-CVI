<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('diplomados_impartidos', function (Blueprint $table) {
            $table->id();
            $table->string('Institucion', 30);
            $table->string('Nombre_diplomado');
            $table->string('Nombre_curso');
            $table->year('AÑO');
            $table->bigInteger('Horas_totales');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            // estableciendo relacion de los diplomados con el usuario
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diplomados_impartidos');
    }
};
