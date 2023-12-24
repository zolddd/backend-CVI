<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('publicacion_cientifica_articulos', function (Blueprint $table) {
            $table->id();
            $table->string('ISSN_impreso', 30);
            $table->string('ISSN_electronico', 30);
            $table->string('DOI', 30);
            $table->string('nombre_revista', 30);
            $table->string('titulo_articulo', 30);
            $table->bigInteger('num_revista');
            $table->bigInteger('vol_revista');
            $table->string('year_publicacion', 30);
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->string('palabra_clave1', 30);
            $table->string('palabra_clave2', 30);
            $table->string('palabra_clave3', 30);
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',30);
            $table->string('subdisciplina',30);
            $table->boolean('apoyo_CONACYT');
            $table->string('rol_participacion', 30);
            $table->string('estatus_publicacion', 30);
            $table->string('objetivo', 30);
            $table->text('url_cita');
            $table->string('cita_a', 40);
            $table->string('cita_b', 40);
            $table->bigInteger('total_cita');
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
        Schema::dropIfExists('publicacion_cientifica_articulos');
    }
};
