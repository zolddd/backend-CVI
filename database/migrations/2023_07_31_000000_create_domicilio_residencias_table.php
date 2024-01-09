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
            $table->integer('Nombre_asentamiento');
            $table->string('Estado');
            $table->string('Municipio_delegacion');
            $table->string('Localidad');
            $table->string('Asentamiento');
            $table->string('Tipo_asentamiento');
            $table->string('Carretera');
            $table->string('Nombre_vialidad');
            $table->boolean('Sin_numero');
            $table->integer('Parte_numerica')->nullable();
            $table->integer('parte_numerica_interior');
            $table->integer('Numero_exterior_anterior')->nullable();
            $table->char('Parte_alfanumerica')->nullable();
            $table->char('Parte_alfanumerica_interior');
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
