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
        Schema::create('difusion_capitulos_publicados', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN');
            $table->string('titulo_libro');
            $table->string('editorial');
            $table->bigInteger('numero_edicion');
            $table->bigInteger('year_publicacion');
            $table->string('titulo_capitulo');
            $table->bigInteger('numero_capitulo');
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->text('resumen');
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
        Schema::dropIfExists('difusion_capitulos_publicados');
    }
};
