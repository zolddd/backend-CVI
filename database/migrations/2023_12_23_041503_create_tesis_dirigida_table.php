<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('tesis_dirigida', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_autor', 25);
            $table->string('primer_apellido_autor', 25);
            $table->string('segundo_apellido_autor', 25);
            $table->string('grado_academico', 25);
            $table->string('rol_participacion', 25);
            $table->string('area', 25);
            $table->string('campo',25);
            $table->string('disciplina',25);
            $table->string('subdisciplina',25);
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tesis_dirigida');
    }
};
