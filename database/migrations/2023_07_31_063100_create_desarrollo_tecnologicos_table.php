<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('desarrollo_tecnologicos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_desarrollo');            
            $table->string('Tipo_desarrollo');
            $table->string('Documentos_respaldo');
            $table->string('Objetivo');
            $table->tinyText('Resumen');
            $table->string('Rol');
            $table->boolean('apoyo_CONACYT');
            $table->string('Sector_SCIAN');
            $table->string('Subsector_SCIAN');
            $table->string('Rama_SCIAN');
            $table->string('Subrama_SCIAN');
            $table->string('Clase_SCIAN');
            $table->string('Sector_OCDE');
            $table->string('Division_OCDE');
            $table->string('Grupo_OCDE');
            $table->string('Clase_OCDE');
            $table->string('Area',25);
            $table->string('Campo',25);
            $table->string('Disciplina',25);
            $table->string('Subdisciplina',25);
            $table->tinyText('Generacion_valor');
            $table->tinyText('Formacion_RRHH');
            $table->tinyText('Id_usuario_beneficiario');
            $table->tinyText('Aplicacion_conocimiento');
            $table->tinyText('Teorico_practico_original');
            $table->tinyText('Id_innvacion_implementado');
            $table->tinyText('Problema_resuelve');
            $table->tinyText('Analisis_pertenencia');
            $table->tinyText('Linea_investigacion');

            // estableciendo relacion del desarollo tecnologico con el usuario
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('desarrollo_tecnologicos');
    }
};
