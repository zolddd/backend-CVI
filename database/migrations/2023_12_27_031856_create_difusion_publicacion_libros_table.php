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
            $table->string('ISBN');
            $table->string('titulo_libro');
            $table->string('pais');
            $table->string('idioma');
            $table->date('year_publicacion');
            $table->string('volumen');
            $table->string('tomo');
            $table->string('tiraje');
            $table->bigInteger('numero_paginas');
            $table->string('palabra_clave1');
            $table->string('palabra_clave2');
            $table->string('palabra_clave3');
            $table->string('editorial');
            $table->bigInteger('numero_edicion');
            $table->bigInteger('year_edicion');
            $table->string('ISBN_traducido');
            $table->string('titulo_traducido');
            $table->string('idioma_traducido');
            $table->boolean('apoyo_CONACYT');
            $table->string('area');
            $table->string('campo');
            $table->string('disciplina');
            $table->string('subdisciplina');
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
