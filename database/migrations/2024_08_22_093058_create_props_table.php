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
        Schema::create('props', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2); // Adjust the precision and scale as needed
            $table->string('image')->nullable();
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('sq_ft'); // Note: changed 'sq/ft' to 'sq_ft'
            $table->string('home_type');
            $table->string('type');
            $table->year('year_built');
            $table->decimal('price_sqft', 10, 2); // Note: changed 'price/sqft' to 'price_sqft'
            $table->text('more_info')->nullable(); // Note: changed 'more/info' to 'more_info'
            $table->string('location');
            $table->string('agent_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('props');
    }
};
