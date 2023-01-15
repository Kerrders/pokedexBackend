<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonSpeciesName
 *
 * @property int $pokemon_species_id
 * @property int $local_language_id
 * @property string $name
 * @property string $genus
 *
 * @package App\Models
 */
class PokemonSpeciesName extends Model
{
	protected $table = 'pokemon_species_names';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pokemon_species_id' => 'int',
		'local_language_id' => 'int'
	];

	protected $fillable = [
		'pokemon_species_id',
		'local_language_id',
		'name',
		'genus'
	];
}
