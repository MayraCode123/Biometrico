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
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id'); // Define id como llave primaria autoincremental
            $table->unsignedBigInteger('id_biometrico'); // Define id_biometrico como una columna regular
            $table->string('name');
            $table->dateTime('time');
            $table->string('state');
            $table->string('type');
            $table->integer('type_register');
            $table->timestamps();
            // Define una clave primaria compuesta usando id y id_biometrico
            $table->primary(['id', 'id_biometrico']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
