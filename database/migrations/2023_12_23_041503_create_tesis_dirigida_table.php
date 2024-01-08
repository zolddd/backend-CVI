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
            $table->string('nombre_autor');
            $table->string('primer_apellido_autor');
            $table->string('segundo_apellido_autor');
            $table->string('grado_academico');
            $table->string('rol_participacion');
            $table->string('area');
            $table->string('campo');
            $table->string('disciplina');
            $table->string('subdisciplina');
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
