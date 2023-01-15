<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonSpecy
 *
 * @property int $id
 * @property string $identifier
 * @property int $generation_id
 * @property string $evolves_from_species_id
 * @property int $evolution_chain_id
 * @property int $color_id
 * @property int $shape_id
 * @property int $habitat_id
 * @property int $gender_rate
 * @property int $capture_rate
 * @property int $base_happiness
 * @property int $is_baby
 * @property int $hatch_counter
 * @property int $has_gender_differences
 * @property int $growth_rate_id
 * @property int $forms_switchable
 * @property int $is_legendary
 * @property int $is_mythical
 * @property int $order
 * @property string $conquest_order
 *
 * @package App\Models
 */
class PokemonSpecy extends Model
{
	protected $table = 'pokemon_species';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'generation_id' => 'int',
		'evolution_chain_id' => 'int',
		'color_id' => 'int',
		'shape_id' => 'int',
		'habitat_id' => 'int',
		'gender_rate' => 'int',
		'capture_rate' => 'int',
		'base_happiness' => 'int',
		'is_baby' => 'int',
		'hatch_counter' => 'int',
		'has_gender_differences' => 'int',
		'growth_rate_id' => 'int',
		'forms_switchable' => 'int',
		'is_legendary' => 'int',
		'is_mythical' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'id',
		'identifier',
		'generation_id',
		'evolves_from_species_id',
		'evolution_chain_id',
		'color_id',
		'shape_id',
		'habitat_id',
		'gender_rate',
		'capture_rate',
		'base_happiness',
		'is_baby',
		'hatch_counter',
		'has_gender_differences',
		'growth_rate_id',
		'forms_switchable',
		'is_legendary',
		'is_mythical',
		'order',
		'conquest_order'
	];
}
