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
        Schema::create('divulgacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_trabajo');
            $table->string('tipo_participacion');
            $table->string('tipo_evento');
            $table->string('institucion_organizadora', 25);
            $table->string('dirigido_a');
            $table->date('fecha');
            $table->string('tipo_divulgacion');
            $table->string('tipo_medio');
            $table->string('palabra_clave1');
            $table->string('palabra_clave2');
            $table->string('palabra_clave3');
            $table->text('notas');
            $table->text('producto_obtenido');            
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
        Schema::dropIfExists('divulgacion');
    }
};
