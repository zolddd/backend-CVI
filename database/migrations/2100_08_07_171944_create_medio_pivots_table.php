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
        Schema::create('medio_pivots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('medio_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('medio_id')->references('id')->on('medio')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medio_pivots');
    }
};
