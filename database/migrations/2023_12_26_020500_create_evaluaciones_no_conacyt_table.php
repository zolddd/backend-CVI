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
            $table->string('institucion', 30);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('cargo', 30);
            $table->string('tipo_evaluacion', 30);
            $table->string('producto_evaluado', 30);
            $table->string('nombre_producto_evaluado', 30);
            $table->text('descripcion_actividad');
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',30);
            $table->string('subdisciplina',30);
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
