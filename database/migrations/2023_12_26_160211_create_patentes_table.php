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
        Schema::create('patentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('tipo_patente', 30);
            $table->string('estado_patente', 30);
            $table->bigInteger('numero_tramite');
            $table->date('fecha_solicitud');
            $table->date('fecha_registro');
            $table->bigInteger('numero_registro');
            $table->string('expediente', 30);
            $table->string('clasificacion_wipo', 30);
            $table->text('resumen');
            $table->string('explotacion_industrial', 30);
            $table->bigInteger('year_publicacion');
            $table->string('pais', 30);
            $table->string('usuario_benficiario');
            $table->text('conocimiento_teorico');
            $table->text('innovacion_implementada');
            $table->text('problema_resuelve');
            $table->text('analisis_pertinencia');
            $table->text('linea_investigacion');
            $table->text('numero_solicitud');
            $table->string('registro_internacional', 30);
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
        Schema::dropIfExists('patentes');
    }
};
