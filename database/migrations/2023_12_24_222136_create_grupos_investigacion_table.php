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
            $table->string('nombre_grupo');
            $table->date('fecha_creacion');
            $table->date('fecha_ingreso');
            $table->string('nombre_lider');
            $table->string('primer_apellido_lider');
            $table->string('segundo_apellido_lider');
            $table->string('institucion_adscripcion');
            $table->bigInteger('total_investigadores');
            $table->text('colaboracion');
            $table->text('impacto');
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
        Schema::dropIfExists('grupos_investigacion');
    }
};
