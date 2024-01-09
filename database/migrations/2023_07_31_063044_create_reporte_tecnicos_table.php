<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void
    {
        Schema::create('reporte_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('institucion');
            $table->date('fecha_entrega');
            $table->date('fecha_publicacion');
            $table->string('numero_paginas');
            $table->string('origen');
            $table->string('descripcion');
            $table->string('objetivos');
            $table->string('palabra_clave1');
            $table->string('palabra_clave2');
            $table->string('palabra_clave3');
            $table->boolean('apoyo_CONACYT');
            $table->string('fondo')->nullable();
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reporte_tecnicos');
    }
};
