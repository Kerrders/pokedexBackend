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
        Schema::create('location_areas', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('game_index')->nullable();
            $table->string('identifier')->nullable();
        });

        Schema::table('location_areas', function (Blueprint $table) {
            $table->index('location_id');
            $table->index('game_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_areas');
        Schema::table('location_areas', function (Blueprint $table) {
            $table->dropIndex(['location_id']);
            $table->dropIndex(['game_index']);
        });
    }
};
