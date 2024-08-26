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
        Schema::create('prop_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prop_id'); // Foreign key to properties table
            $table->string('image'); // Column for storing image file names or paths
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prop_image');
    }
};
