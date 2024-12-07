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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('driverId');
            $table->string('name',15);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imageUrl')->nullable();
            $table->string('phoneNumber',10);
            $table->string('secondaryNumber', 10)->nullable(); // this line for the optional second number
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
