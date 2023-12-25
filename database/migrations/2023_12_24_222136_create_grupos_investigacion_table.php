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
        Schema::create('grupos_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_grupo', 30);
            $table->date('fecha_creacion');
            $table->date('fecha_ingreso');
            $table->string('nombre_lider', 30);
            $table->string('primer_apellido_lider', 30);
            $table->string('segundo_apellido_lider', 30);
            $table->string('institucion_adscripcion', 30);
            $table->bigInteger('total_investigadores');
            $table->text('colaboracion');
            $table->text('impacto');
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
        Schema::dropIfExists('grupos_investigacion');
    }
};
