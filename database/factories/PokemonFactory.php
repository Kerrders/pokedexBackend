<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    protected $model = Pokemon::class;

    public function definition()
    {
        return [
            'id' => fake()->unique()->numberBetween(1,151),
            'identifier' => fake()->unique()->word,
            'species_id' => fake()->numberBetween(1,151),
            'height' => fake()->numberBetween(1,10),
            'weight' => fake()->numberBetween(1,300),
            'base_experience' => fake()->numberBetween(1,255),
            'order' => fake()->numberBetween(1,151),
            'is_default' => fake()->numberBetween(0,1)
        ];
    }
}
