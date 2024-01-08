<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documento_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo_documento');
            $table->string('Nombre_autor');
            $table->string('Primer_Apellido_Autor');
            $table->string('Segundo_Apellido_Autor');
            $table->string('Paginas');
            $table->string('Palabras_claves');
            $table->string('Titulo_publicacion');
            $table->date('Año_Publicacion');
            $table->string('Area');
            $table->string('Campo');
            $table->string('Disciplina');
            $table->string('Subdisciplina');
            // estableciendo relacion con el usuario
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
        Schema::dropIfExists('documento_trabajos');
    }
};
