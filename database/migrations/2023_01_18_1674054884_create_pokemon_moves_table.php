<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonMovesTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon_moves', function (Blueprint $table) {
            $table->integer('pokemon_id')->nullable();
            $table->integer('version_group_id')->nullable();
            $table->integer('move_id')->nullable();
            $table->integer('pokemon_move_method_id')->nullable();
            $table->integer('level')->nullable();
            $table->integer('order')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_moves');
    }
}
