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
        Schema::create('memorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_memorias');
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('titulo_publicacion');
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->bigInteger('year_publicacion');
            $table->string('pais');
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
        Schema::dropIfExists('memorias');
    }
};
