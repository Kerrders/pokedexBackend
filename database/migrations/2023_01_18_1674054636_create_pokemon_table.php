<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('identifier')->nullable();
            $table->integer('species_id')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('base_experience')->nullable()->default(0);
            $table->integer('order')->nullable();
            $table->integer('is_default')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
