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
        Schema::create('participacion_congreso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_congreso', 30);
            $table->string('titulo_trabajo', 30);
            $table->string('participacion_congreso', 30);
            $table->string('pais',25);
            $table->date('fecha');
            $table->string('palabra_clave1',30);
            $table->string('palabra_clave2',30);
            $table->string('palabra_clave3',30);
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
        Schema::dropIfExists('participacion_congreso');
    }
};
