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
        Schema::create('experiencia_laborals', function (Blueprint $table) {
            $table->id();
            $table->string('Puesto_desempeñado', 25);
            $table->tinyText('Institucion');
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin');
            $table->string('Nombramiento', 25);
            $table->tinyText('Logros');
            $table->string('Areas', 25);
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
        Schema::dropIfExists('experiencia_laborals');
    }
};
