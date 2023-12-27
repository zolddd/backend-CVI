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
        Schema::create('difusion_publicacion_libros', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN', 30);
            $table->string('titulo_libro', 30);
            $table->string('pais', 30);
            $table->string('idioma', 30);
            $table->date('year_publicacion');
            $table->string('volumen', 30);
            $table->string('tomo', 30);
            $table->string('tiraje', 30);
            $table->bigInteger('numero_paginas');
            $table->string('palabra_clave1',30);
            $table->string('palabra_clave2',30);
            $table->string('palabra_clave3',30);
            $table->string('editorial', 30);
            $table->bigInteger('numero_edicion');
            $table->bigInteger('year_edicion');
            $table->string('ISBN_traducido', 30);
            $table->string('titulo_traducido', 30);
            $table->string('idioma_traducido', 30);
            $table->boolean('apoyo_CONACYT');
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',25);
            $table->string('subdisciplina',25);
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
        Schema::dropIfExists('difusion_publicacion_libros');
    }
};
