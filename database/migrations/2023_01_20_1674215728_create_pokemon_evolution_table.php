<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonEvolutionTable extends Migration
{
    public function up()
    {
Schema::create('pokemon_evolution', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('evolved_species_id')->nullable();
            $table->integer('evolution_trigger_id')->nullable();
            $table->integer('version_group_id')->nullable();
            $table->boolean('is_default')->nullable();
            $table->text('trigger_item_id')->nullable();
            $table->integer('minimum_level')->nullable();
            $table->text('gender_id')->nullable();
            $table->text('location_id')->nullable();
            $table->text('held_item_id')->nullable();
            $table->text('time_of_day')->nullable();
            $table->text('known_move_id')->nullable();
            $table->text('known_move_type_id')->nullable();
            $table->text('minimum_happiness')->nullable();
            $table->text('minimum_beauty')->nullable();
            $table->text('minimum_affection')->nullable();
            $table->text('relative_physical_stats')->nullable();
            $table->text('party_species_id')->nullable();
            $table->text('party_type_id')->nullable();
            $table->text('trade_species_id')->nullable();
            $table->integer('needs_overworld_rain')->nullable();
            $table->integer('turn_upside_down')->nullable();
            $table->integer('needs_multiplayer')->nullable();
            $table->integer('near_special_rock')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('required_pokemon_form_id')->nullable();
            $table->integer('evolved_pokemon_form_id')->nullable();
            $table->integer('used_move_id')->nullable();
            $table->integer('minimum_move_count')->nullable();
            $table->integer('minimum_steps')->nullable();
            $table->integer('minimum_damage_taken')->nullable();
            $table->integer('nature_bitmask')->nullable();
            $table->text('condition_expression')->nullable();
            $table->integer('percentage_chance')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon_evolution');
    }
}
