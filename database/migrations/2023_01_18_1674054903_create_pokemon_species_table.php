<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonSpeciesTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon_species', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('identifier')->nullable();
            $table->integer('generation_id')->nullable();
            $table->text('evolves_from_species_id')->nullable();
            $table->integer('evolution_chain_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('shape_id')->nullable();
            $table->integer('habitat_id')->nullable();
            $table->integer('gender_rate')->nullable();
            $table->integer('capture_rate')->nullable();
            $table->integer('base_happiness')->nullable();
            $table->integer('is_baby')->nullable();
            $table->integer('hatch_counter')->nullable();
            $table->integer('has_gender_differences')->nullable();
            $table->integer('growth_rate_id')->nullable();
            $table->integer('forms_switchable')->nullable();
            $table->integer('is_legendary')->nullable();
            $table->integer('is_mythical')->nullable();
            $table->integer('order')->nullable();
            $table->text('conquest_order')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_species');
    }
}
