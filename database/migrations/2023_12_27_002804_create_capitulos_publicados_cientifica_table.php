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
        Schema::create('capitulos_publicados_cientifica', function (Blueprint $table) {

            //Científica- Capítulos publicados
            $table->id();
            $table->string('ISBN', 30);
            $table->string('titulo_libro', 30);
            $table->string('editorial', 30);
            $table->bigInteger('numero_edicion');
            $table->bigInteger('year_publicacion');
            $table->string('titulo_capitulo', 30);
            $table->bigInteger('numero_capitulo');
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->string('DOI', 30);
            $table->text('resumen');
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',30);
            $table->string('subdisciplina',30);
            $table->boolean('apoyo_CONACYT');
            $table->string('rol_participacion', 30);
            $table->string('estatus_publicacion', 30);
            $table->string('objetivo', 30);
            $table->boolean('dictaminado');
            $table->text('url_cita');
            $table->text('cita_a');
            $table->text('cita_b');
            $table->bigInteger('total_citas');

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
        Schema::dropIfExists('capitulos_publicados');
    }
};
