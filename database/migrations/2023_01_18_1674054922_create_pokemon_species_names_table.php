<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonSpeciesNamesTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon_species_names', function (Blueprint $table) {
            $table->integer('pokemon_species_id')->nullable();
            $table->integer('local_language_id')->nullable();
            $table->text('name');
            $table->text('genus');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_species_names');
    }
}
