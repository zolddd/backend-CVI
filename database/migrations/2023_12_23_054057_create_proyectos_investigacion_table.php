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
            $table->string('nombre_proyecto');
            $table->string('tipo_proyecto');
            $table->date('inicio');
            $table->date('fin');
            $table->string('institucion');
            $table->string('logro_proyecto');
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
        Schema::dropIfExists('proyectos_investigacion');
    }
};
