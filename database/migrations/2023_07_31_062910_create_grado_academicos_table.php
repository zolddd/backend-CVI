<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grado_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo', 25);
            $table->string('Nivel_escolaridad');
            $table->string('Estatus');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            $table->string('Cedula')->nullable();
            $table->string('Opciones_Titulacion')->nullable();
            $table->date('Fecha_Obtencion')->nullable();
            $table->tinyText('Institucion');
            // estableciendo relacion con el usuario
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
        Schema::dropIfExists('grado_academicos');
    }
};