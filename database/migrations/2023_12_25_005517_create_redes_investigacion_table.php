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
        Schema::create('redes_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_red', 30);
            $table->date('fecha_creacion');
            $table->date('fecha_ingreso');
            $table->string('nombre_responsable', 30);
            $table->string('primer_apellido_responsable', 30);
            $table->string('segundo_apellido_responsable', 30);
            $table->string('institucion_adscripcion', 30);
            $table->bigInteger('total_integrantes');            
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
        Schema::dropIfExists('redes_investigacion');
    }
};
