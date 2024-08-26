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
        Schema::create('savedprops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prop_id'); // Foreign key for properties
            $table->unsignedBigInteger('user_id'); // Foreign key for users
            $table->string('title'); // Title of the property
            $table->string('image'); // Image filename
            $table->string('location'); // Location of the property
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savedprops');
    }
};
