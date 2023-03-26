<?php

namespace Database\Factories;

use App\Models\PokemonSpecy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PokemonSpecy>
 */
class PokemonSpecyFactory extends Factory
{
    protected $model = PokemonSpecy::class;

    public function definition()
    {
        return [
            'identifier' => $this->faker->word,
            'generation_id' => $this->faker->numberBetween(1, 8),
            'evolves_from_species_id' => null,
            'evolution_chain_id' => $this->faker->numberBetween(1, 10),
            'color_id' => $this->faker->numberBetween(1, 10),
            'shape_id' => $this->faker->numberBetween(1, 10),
            'habitat_id' => $this->faker->numberBetween(1, 10),
            'gender_rate' => $this->faker->numberBetween(0, 8),
            'capture_rate' => $this->faker->numberBetween(1, 255),
            'base_happiness' => $this->faker->numberBetween(0, 255),
            'is_baby' => $this->faker->boolean,
            'hatch_counter' => $this->faker->numberBetween(1, 255),
            'has_gender_differences' => $this->faker->boolean,
            'growth_rate_id' => $this->faker->numberBetween(1, 10),
            'forms_switchable' => $this->faker->boolean,
            'is_legendary' => $this->faker->boolean,
            'is_mythical' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(1, 1000),
            'conquest_order' => $this->faker->word,
        ];
    }
}
