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
            $table->string('titulo_memorias', 30);
            $table->string('nombre', 25);
            $table->string('primer_apellido', 25);
            $table->string('segundo_apellido', 25);
            $table->string('titulo_publicacion', 30);
            $table->bigInteger('de_pagina');
            $table->bigInteger('a_pagina');
            $table->bigInteger('year_publicacion');
            $table->string('pais', 30);
            $table->string('palabra_clave1',30);
            $table->string('palabra_clave2',30);
            $table->string('palabra_clave3',30);
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',30);
            $table->string('subdisciplina',30);
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
