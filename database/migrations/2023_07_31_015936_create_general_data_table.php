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
        Schema::create('Informacion General', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->rememberToken();

            // Researcher Attributes
            $table->string("CURP")->unique();
            $table->string("RFC")->unique();
            $table->string("nombre");
            $table->string("primer_apellido");
            $table->string("segundo_apellido");
            $table->date("fecha_de_nacimiento");
            $table->enum("sexo",["masculino","femenino","sin especificar"]);
            $table->string("pais");
            $table->string("entidad");
            $table->enum("estado_conyugal",["casado","divorciado","separado","soltero","unio libre","viudo","contratos de convivencia"]);
            $table->string("nacionalidad");
            $table->string("cvi");
            $table->string("medio");
            $table->string("categoria");
            $table->string("telefono");
            $table->string("principal");
            // TODO: Add FK for address
            $table->string("correo")->unique();
            $table->string("contrasena");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Informacion General');
    }
};
