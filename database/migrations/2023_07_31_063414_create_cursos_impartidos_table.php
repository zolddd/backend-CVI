<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cursos_impartidos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_curso');
            $table->bigInteger('Horas_total');
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin');
            $table->string('Nivel_escolaridad');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            // estableciendo relacion de los cursos con el usuario
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos_impartidos');
    }
};
