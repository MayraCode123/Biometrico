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
        Schema::create('horario', function (Blueprint $table) {

            $table->id();
            $table->string('tipo');
            $table->time('time_i');
            $table->time('time_f');
            $table->string('state');
            $table->unsignedBigInteger('date_id');
            $table->foreign('date_id')->references('id')->on('date')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario');
    }
};
