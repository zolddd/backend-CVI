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
        Schema::create('medio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean("principal");
            $table->enum("categoria", ["OFICIAL", "PERSONAL"]);
            $table->string("telefono")->nullable();
            $table->string("correo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medio');
    }
};
