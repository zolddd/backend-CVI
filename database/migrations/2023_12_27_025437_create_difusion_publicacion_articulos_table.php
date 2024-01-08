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
        Schema::create('difusion_publicacion_articulos', function (Blueprint $table) {
            $table->id();
            $table->string('ISSN_impreso');
            $table->string('ISSN_electronico');
            $table->string('DOI');
            $table->string('nombre_revista');
            $table->string('titulo_articulo');
            $table->bigInteger('num_revista');
            $table->bigInteger('vol_revista');
            $table->bigInteger('year_publicacion');
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->string('palabra_clave1');
            $table->string('palabra_clave2');
            $table->string('palabra_clave3');
            $table->string('area');
            $table->string('campo');
            $table->string('disciplina');
            $table->string('subdisciplina');
            $table->boolean('apoyo_CONACYT');
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
        Schema::dropIfExists('difusion_publicacion_articulos');
    }
};
