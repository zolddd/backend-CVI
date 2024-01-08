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
            $table->string('Pais');
            $table->integer('Codigo_postal');
            $table->string('Estado');
            $table->string('Municipio_delegacion');
            $table->string('Localidad');
            $table->string('Asentamiento');
            $table->string('Tipo_asentamiento');
            $table->string('Nombre_asentamiento');
            $table->string('Carretera');
            $table->string('Nombre_vialidad');
            $table->integer('Parte_numerica1');
            $table->integer('Numero_exterior_anterior');
            $table->char('Parte_alfanumerica', 1);
            $table->integer('Parte_numerica2');
            $table->string('Tipo');
            $table->string('Nombre');
            $table->string('Descripcion_ubicacion', 255);
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
        Schema::dropIfExists('domicilio_residencias');
    }
};
