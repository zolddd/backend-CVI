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
        Schema::create('estancias_investigacion', function (Blueprint $table) {
            $table->id();
            $table->string('institucion', 30);
            $table->string('nombre_estancia', 30);
            $table->date('inicio');
            $table->date('fin');
            $table->string('tipo_estancia', 30);
            $table->string('logro_profesional', 30);
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
        Schema::dropIfExists('estancias_investigacion');
    }
};
