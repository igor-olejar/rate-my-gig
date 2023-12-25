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
        Schema::create('uk_towns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('county');
            $table->string('country');
            $table->string('grid_reference', 8);
            $table->integer('easting');
            $table->integer('northing');
            $table->float('latitude', 8, 5);
            $table->float('longitude', 8, 5);
            $table->integer('elevation');
            $table->string('postcode_sector', 6);
            $table->string('local_government_area', 44);
            $table->string('nuts_region', 24);
            $table->string('type', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uk_towns');
    }
};
