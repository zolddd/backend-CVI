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
            $table->string('Titulo_documento', 25);
            $table->string('Nombre_autor', 20);
            $table->string('Primer_Apellido_Autor', 20);
            $table->string('Segundo_Apellido_Autor', 20);
            $table->string('Paginas', 5);
            $table->string('Palabras_claves', 25);
            $table->string('Titulo_publicacion', 25);
            $table->date('Año_Publicacion');
            $table->string('Area', 25);
            $table->string('Campo', 25);
            $table->string('Disciplina', 25);
            $table->string('Subdisciplina', 25);
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
