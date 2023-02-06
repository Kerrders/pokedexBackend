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
            $table->string('name')->nullable();
            $table->string('genus')->nullable();
        });

        Schema::table('pokemon_species_names', function (Blueprint $table) {
            $table->index(['name', 'local_language_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_species_names');
    }
}
