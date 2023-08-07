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
        Schema::create('informacion_general', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Researcher Attributes
            $table->string("curp")->unique();
            $table->string("rfc")->unique();
            $table->string("nombre");
            $table->string("primer_apellido");
            $table->string("segundo_apellido");
            $table->date("fecha_de_nacimiento");
            $table->enum("sexo", ["MASCULINO", "FEMENINO", "SIN ESPECIFICAR"]);
            $table->string("pais");
            $table->string("entidad");
            $table->enum("estado_conyugal", ["CASADO", "DIVORCIADO", "SEPARADO", "SOLTERO", "UNION LIBRE", "VIUDO", "CONTRATOS DE CONVIVENCIA"]);
            $table->string("nacionalidad");
            $table->string("cvi")->nullable();
            // TODO: Add FK for address

            $table->string("medio")->nullable(); // TODO: Add medio as a independent table :)
            $table->string("categoria")->nullable();
            $table->string("telefono")->nullable();
            $table->string("principal")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_general');
    }
};
