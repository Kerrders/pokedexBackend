<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonEvolution
 *
 * @property int $id
 * @property int $evolved_species_id
 * @property int $evolution_trigger_id
 * @property string $trigger_item_id
 * @property int $minimum_level
 * @property string $gender_id
 * @property string $location_id
 * @property string $held_item_id
 * @property string $time_of_day
 * @property string $known_move_id
 * @property string $known_move_type_id
 * @property string $minimum_happiness
 * @property string $minimum_beauty
 * @property string $minimum_affection
 * @property string $relative_physical_stats
 * @property string $party_species_id
 * @property string $party_type_id
 * @property string $trade_species_id
 * @property int $needs_overworld_rain
 * @property int $turn_upside_down
 *
 * @package App\Models
 */
class PokemonEvolution extends Model
{
    use Cachable;

	protected $table = 'pokemon_evolution';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'evolved_species_id' => 'int',
		'evolution_trigger_id' => 'int',
		'minimum_level' => 'int',
		'needs_overworld_rain' => 'int',
		'turn_upside_down' => 'int'
	];

	protected $fillable = [
		'id',
		'evolved_species_id',
		'evolution_trigger_id',
		'trigger_item_id',
		'minimum_level',
		'gender_id',
		'location_id',
		'held_item_id',
		'time_of_day',
		'known_move_id',
		'known_move_type_id',
		'minimum_happiness',
		'minimum_beauty',
		'minimum_affection',
		'relative_physical_stats',
		'party_species_id',
		'party_type_id',
		'trade_species_id',
		'needs_overworld_rain',
		'turn_upside_down'
	];
}
