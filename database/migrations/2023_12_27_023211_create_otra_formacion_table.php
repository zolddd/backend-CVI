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
        Schema::create('otra_formacion', function (Blueprint $table) {
            $table->id();
            $table->string('formacion_continua');
            $table->string('nombre');
            $table->string('institucion');
            $table->bigInteger('year');
            $table->bigInteger('horas_totales');
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
        Schema::dropIfExists('otra_formacion');
    }
};
