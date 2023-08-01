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
        Schema::create('diplomados_impartidos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_diplomado');
            $table->string('Nombre_curso');
            $table->year('AÑO');
            $table->bigInteger('Horas_totales');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomados_impartidos');
    }
};
