<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void
    {
        Schema::create('reporte_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 25);
            $table->string('institucion');
            $table->date('fecha_entrega');
            $table->date('fecha_publicacion');
            $table->string('nombramiento', 25);
            $table->string('numero_paginas');
            $table->string('origen', 15);
            $table->tinyText('descripcion');
            $table->tinyText('objetivos');
            $table->tinyText('palabras_claves');
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
