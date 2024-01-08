<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiencia_laborals', function (Blueprint $table) {
            $table->id();
            $table->string('Puesto_desempeñado');
            $table->string('Institucion');
            $table->string('Institucion_catedra')->nullable();
            $table->boolean('Empleo_actual');
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin')->nullable();
            $table->string('Nombramiento');
            $table->string('Logros');
            $table->string('Areas');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            // estableciendo relacion con el usuario
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
        Schema::dropIfExists('experiencia_laborals');
    }
};
