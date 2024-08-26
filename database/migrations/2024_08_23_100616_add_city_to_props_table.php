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
        Schema::table('props', function (Blueprint $table) {
            $table->string('city')->after('location'); // Adds 'city' column after 'location'

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('props', function (Blueprint $table) {
            //
        });
    }
};
