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
        Schema::create('grado_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo', 25);
            $table->enum('Nivel_escolaridad',['preparatoria','licenciatura','ingeniería','maestría','doctorado'])->default('licenciatura');
            $table->enum('Estatus', ['Activo', 'Inactivo', 'En proceso'])->default('Inactivo');
            $table->string('Area',25);
            $table->string('Campo',25);
            $table->string('Disciplina',25);
            $table->string('Subdisciplina',25);
            $table->string('Cedula',25);
            $table->string('Opciones_Titulacion',25);
            $table->date('Fecha_Obtencion');
            $table->tinyText('Institucion');
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
