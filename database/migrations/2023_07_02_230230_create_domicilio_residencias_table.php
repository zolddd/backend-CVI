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
        Schema::create('domicilio_residencias', function (Blueprint $table) {
            $table->id();
            $table->string('Pais', 20);
            $table->integer('Codigo_postal');
            $table->string('Estado', 20);
            $table->string('Municipio_delegacion', 20);
            $table->string('Localidad', 20);
            $table->string('Asentamiento', 20);
            $table->string('Tipo_asentamiento', 15);
            $table->string('Nombre_asentamiento', 30);
            $table->string('Carretera', 20);
            $table->string('Nombre_vialidad', 20);
            $table->integer('Parte_numerica1');
            $table->integer('Numero_exterior_anterior');
            $table->char('Parte_alfanumerica', 1);
            $table->integer('Parte_numerica2');
            $table->string('Tipo', 15);
            $table->string('Nombre', 15);
            $table->string('Descripcion_ubicacion', 255);
            $table->timestamps();
        });
    }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilio_residencias');
    }
};
