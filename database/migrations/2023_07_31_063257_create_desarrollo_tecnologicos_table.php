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
        Schema::create('desarrollo_tecnologicos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_desarrollo',25);            
            $table->string('Tipo_desarrollo',25);
            $table->string('Documentos_respaldo',25);
            $table->string('Objetivo',25);
            $table->tinyText('Resumen');
            $table->string('Rol',25);
            $table->string('Area',25);
            $table->string('Campo',25);
            $table->string('Disciplina',25);
            $table->string('Subdisciplina',25);
            $table->tinyText('Generacion_valor');
            $table->tinyText('Formacion_RRHH');
            $table->tinyText('Id-Usuario_beneficiario');
            $table->tinyText('Aplicacion_conocimeinto');
            $table->tinyText('Teorico-practico_original');
            $table->tinyText('Id-Innvacion_implementado');
            $table->tinyText('Problema_resuelve');
            $table->tinyText('Analisis_pertenencia');
            $table->tinyText('Linea_investigacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desarrollo_tecnologicos');
    }
};
