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
            $table->id();
            $table->integer('id_biometrico')->unsigned();  // Foreign key referencing personal_bio.id_biometrico
            $table->string('name');
            $table->dateTime('time');
            $table->string('state');
            $table->string('type');
            $table->integer('type_register');
            $table->timestamps();
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
