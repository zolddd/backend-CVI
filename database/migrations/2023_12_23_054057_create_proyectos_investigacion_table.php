<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('proyectos_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto', 30);
            $table->string('tipo_proyecto', 30);
            $table->date('inicio');
            $table->date('fin');
            $table->string('institucion', 30);
            $table->string('logro_proyecto', 30);
            $table->string('area', 30);
            $table->string('campo',30);
            $table->string('disciplina',25);
            $table->string('subdisciplina',25);
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
        Schema::dropIfExists('proyectos_investigacion');
    }
};
