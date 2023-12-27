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
            $table->string('titulo_trabajo', 30);
            $table->string('tipo_participacion', 25);
            $table->string('tipo_evento', 25);
            $table->string('institucion_organizadora', 25);
            $table->string('dirigido_a', 25);
            $table->date('fecha');
            $table->string('tipo_divulgacion', 25);
            $table->string('tipo_medio', 25);
            $table->string('palabra_clave1',30);
            $table->string('palabra_clave2',30);
            $table->string('palabra_clave3',30);
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
