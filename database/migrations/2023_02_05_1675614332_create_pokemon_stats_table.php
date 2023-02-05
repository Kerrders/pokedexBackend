<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonStatsTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon_stats', function (Blueprint $table) {
            $table->integer('pokemon_id',)->nullable();
            $table->integer('stat_id',)->nullable();
            $table->integer('base_stat',)->nullable();
            $table->integer('effort',)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_stats');
    }
}
