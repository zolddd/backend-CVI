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
        Schema::create('evaluaciones_no_conacyt', function (Blueprint $table) {
            $table->id();
            $table->string('institucion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('cargo');
            $table->string('tipo_evaluacion');
            $table->string('producto_evaluado');
            $table->string('nombre_producto_evaluado', 30);
            $table->text('descripcion_actividad');
            $table->string('area');
            $table->string('campo');
            $table->string('disciplina');
            $table->string('subdisciplina');
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
        Schema::dropIfExists('evaluaciones_no_conacyt');
    }
};
