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
        Schema::create('distinciones_no_conacyt', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_distincion');
            $table->string('institucion');
            $table->bigInteger('year');
            $table->string('pais');
            $table->text('descripcion_distincion');
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
        Schema::dropIfExists('distinciones_no_conacyt');
    }
};
