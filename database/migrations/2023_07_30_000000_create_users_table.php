<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            // En la migración de 'usuarios'
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            
            $table->unsignedBigInteger('informacion_general_id')->nullable();
            $table->foreign('informacion_general_id')->references('id')->on('informacion_general')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::disableForeignKeyConstraints(); // Deshabilita las restricciones de clave externa primero
        Schema::dropIfExists('usuarios');
        
        
    }
};
