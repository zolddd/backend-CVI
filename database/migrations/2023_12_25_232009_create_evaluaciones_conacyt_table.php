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
        Schema::create('evaluaciones_conacyt', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_programa');
            $table->date('fecha_asignacion');
            $table->date('fecha_aceptacion');
            $table->date('fecha_evaluacion');
            $table->text('descripcion');
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
        Schema::dropIfExists('evaluaciones_conacyt');
    }
};
