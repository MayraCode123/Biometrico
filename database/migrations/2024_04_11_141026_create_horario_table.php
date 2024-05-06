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
            $table->string('name');
            $table->time('min_hr_entrada');
            $table->time('hr_entrada');
            $table->time('hr_entrada_min_tolerancia');
            $table->time('hr_entrada_min_retraso');
            $table->time('hr_salida');
            $table->time('hr_min_salida');
            // $table->unsignedBigInteger('date_id');
            // $table->foreign('date_id')->references('id')->on('date')->onDelete('cascade');
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
