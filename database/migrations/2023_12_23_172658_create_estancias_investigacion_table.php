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
            $table->string('institucion');
            $table->string('nombre_estancia');
            $table->date('inicio');
            $table->date('fin');
            $table->string('tipo_estancia');
            $table->string('logro_profesional');
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
        Schema::dropIfExists('estancias_investigacion');
    }
};
