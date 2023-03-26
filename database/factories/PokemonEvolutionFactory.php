<?php

namespace Database\Factories;

use App\Models\PokemonEvolution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PokemonEvolution>
 */
class PokemonEvolutionFactory extends Factory
{
    protected $model = PokemonEvolution::class;

    public function definition()
    {
        return [
            'evolved_species_id' => $this->faker->randomNumber(),
            'evolution_trigger_id' => $this->faker->randomNumber(),
            'trigger_item_id' => null,
            'minimum_level' => $this->faker->numberBetween(1, 100),
            'gender_id' => null,
            'location_id' => null,
            'held_item_id' => null,
            'time_of_day' => null,
            'known_move_id' => null,
            'known_move_type_id' => null,
            'minimum_happiness' => null,
            'minimum_beauty' => null,
            'minimum_affection' => null,
            'relative_physical_stats' => null,
            'party_species_id' => null,
            'party_type_id' => null,
            'trade_species_id' => null,
            'needs_overworld_rain' => $this->faker->boolean,
            'turn_upside_down' => $this->faker->boolean,
        ];
    }
}
