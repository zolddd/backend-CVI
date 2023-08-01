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
        Schema::create('desarrollo_software', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo',25);
            $table->string('Tipo_desarrollo',20);
            $table->string('Derechos_autor',20);
            $table->string('Pais',15);
            $table->string('Derechos_Autor2');
            $table->string('Pais2');
            $table->integer('Horas_hombre');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_fin');
            $table->bigInteger('Costo');
            $table->string('Rol_participacion');
            $table->tinyText('Beneficiario');
            $table->tinyText('Objectivo');
            $table->tinyText('Resumen');
            $table->tinyText('Contribucion');
            $table->tinyText('Generacion_valor');
            $table->tinyText('Formacion_RRRHH');
            $table->tinyText('Logros');
            $table->tinyText('Generacion_conocimiento_tp');
            $table->tinyText('Identificacion_innocacion_imple');
            $table->tinyText('Problema_resuelve');
            $table->tinyText('Analisi_pertinencia');
            $table->tinyText('Linea_investigacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desarrollo_software');
    }
};
