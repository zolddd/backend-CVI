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
        Schema::create('innovaions', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',25);
            $table->date('Fecha_fin');
            $table->tinyText('Descripcion');
            $table->string('Tipo_innovacion',25);
            $table->string('Tipo_innovacion_OSLO',25);
            $table->string('PP_intelectual',25);
            $table->string('Potencial_cobertura',25);
            $table->string('Area',25);
            $table->string('Campo',25);
            $table->string('Disciplina',25);
            $table->string('Subdisciplina',25);
            $table->bigInteger('Monto_venta');
            $table->bigInteger('Volumen_produccion');
            $table->bigInteger('Empleados_directos');
            $table->bigInteger('Empleados_indirectos');
            $table->string('Usuario_beneficiario',25);
            $table->tinyText('Generacion_conocimiento_tp');
            $table->tinyText('Innovacion_Implementada');
            $table->tinyText('Problema_resuelve');
            $table->tinyText('Analisis_pertinencia');
            $table->tinyText('Linea_investigacion');
            $table->tinyText('Generacion_valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovaions');
    }
};
