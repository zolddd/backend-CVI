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
        Schema::create('certificaciones_medicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('folio');
            $table->string('consejo');
            $table->string('especialidad');
            $table->date('vigencia_de');
            $table->date('vigencia_a');
            $table->string('tipo_certificacion');
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
        Schema::dropIfExists('certificaciones_medicas');
    }
};
