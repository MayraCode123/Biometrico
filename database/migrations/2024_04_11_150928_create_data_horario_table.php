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
        Schema::create('data_horario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id');
            $table->unsignedBigInteger('horario_id');
            // Aquí puedes agregar otras columnas si es necesario

            // Definir las claves foráneas
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->foreign('horario_id')->references('id')->on('horario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_horario');
    }
};
