<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_encounters', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('version_id')->nullable();
            $table->integer('location_area_id')->nullable();
            $table->integer('encounter_slot_id')->nullable();
            $table->integer('pokemon_id')->nullable();
            $table->integer('min_level')->nullable();
            $table->integer('max_level')->nullable();
        });

        Schema::table('pokemon_encounters', function (Blueprint $table) {
            $table->index('pokemon_id');
            $table->index('version_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_encounters');
        Schema::table('pokemon_encounters', function (Blueprint $table) {
            $table->dropIndex(['pokemon_id']);
            $table->dropIndex(['version_id']);
        });
    }
};
