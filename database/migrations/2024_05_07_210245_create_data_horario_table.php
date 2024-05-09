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
            $table->unsignedBigInteger('data_id_biometrico'); // Cambiar el nombre de la columna para reflejar la relación
            $table->unsignedBigInteger('horario_id');

            $table->foreign('data_id_biometrico')->references('id_biometrico')->on('data'); // Hacer referencia a la columna correcta
            $table->foreign('horario_id')->references('id')->on('horario');
            $table->timestamps();
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
