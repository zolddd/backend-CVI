<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('innovaions', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->date('Fecha_fin');
            $table->tinyText('Descripcion');
            $table->string('Tipo_innovacion');
            $table->string('Tipo_innovacion_OSLO');
            $table->string('PP_intelectual');
            $table->string('Potencial_cobertura');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            $table->bigInteger('Monto_venta');
            $table->bigInteger('Volumen_produccion');
            $table->bigInteger('Empleados_directos');
            $table->bigInteger('Empleados_indirectos');
            $table->string('Usuario_beneficiario');
            $table->tinyText('Generacion_conocimiento_tp');
            $table->tinyText('Innovacion_Implementada');
            $table->tinyText('Problema_resuelve');
            $table->tinyText('Analisis_pertinencia');
            $table->tinyText('Linea_investigacion');
            $table->tinyText('Generacion_valor');

            // estableciendo relacion de inovacion con el usuario
            $table->unsignedBigInteger('id_investigador')->nullable();
            $table->foreign('id_investigador')->references('id')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('innovaions');
    }
};
