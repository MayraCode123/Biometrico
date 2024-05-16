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
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidad')->onDelete('cascade');
            $table->unsignedBigInteger('data_personal_id');
            $table->foreign('data_personal_id')->references('data_id_biometrico')->on('data_personal')->onDelete('cascade'); //llamnada al id del biometrico de data no al id sino al id de biometrico id_biometrico
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
