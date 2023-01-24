<?php

namespace Database\Factories;

use App\Models\Move;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\Move>
 */
class MoveFactory extends Factory
{
    protected $model = Move::class;

    public function definition()
    {
        return [
            'id' => fake()->unique()->randomNumber(),
            'identifier' => fake()->unique()->word,
            'generation_id' => fake()->randomNumber(1),
            'type_id' => fake()->randomNumber(1),
            'power' => fake()->randomNumber(2),
            'pp' => fake()->randomNumber(1),
            'accuracy' => fake()->numberBetween(1, 100),
            'priority' => fake()->randomNumber(1),
            'target_id' => fake()->randomNumber(1),
            'damage_class_id' => fake()->randomNumber(1),
            'effect_id' => fake()->randomNumber(1),
            'effect_chance' => fake()->randomNumber(2),
            'contest_type_id' => fake()->randomNumber(1),
            'contest_effect_id' => fake()->randomNumber(1),
            'super_contest_effect_id' => fake()->randomNumber(1)
        ];
    }
}
