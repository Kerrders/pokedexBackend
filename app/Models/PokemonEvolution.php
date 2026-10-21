<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PokemonEvolution
 *
 * @property int $id
 * @property int $evolved_species_id
 * @property int $evolution_trigger_id
 * @property int $version_group_id
 * @property bool $is_default
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
 * @property int $needs_multiplayer
 * @property int $near_special_rock
 * @property int $region_id
 * @property int $required_pokemon_form_id
 * @property int $evolved_pokemon_form_id
 * @property int $used_move_id
 * @property int $minimum_move_count
 * @property int $minimum_steps
 * @property int $minimum_damage_taken
 * @property int $nature_bitmask
 * @property string $condition_expression
 * @property int $percentage_chance
 *
 * @package App\Models
 */
class PokemonEvolution extends Model
{
    use HasFactory;
    use Cachable;

	protected $table = 'pokemon_evolution';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'evolved_species_id' => 'int',
		'evolution_trigger_id' => 'int',
		'version_group_id' => 'int',
		'is_default' => 'bool',
		'minimum_level' => 'int',
		'needs_overworld_rain' => 'int',
		'turn_upside_down' => 'int',
		'needs_multiplayer' => 'int',
		'near_special_rock' => 'int',
		'region_id' => 'int',
		'required_pokemon_form_id' => 'int',
		'evolved_pokemon_form_id' => 'int',
		'used_move_id' => 'int',
		'minimum_move_count' => 'int',
		'minimum_steps' => 'int',
		'minimum_damage_taken' => 'int',
		'nature_bitmask' => 'int',
		'percentage_chance' => 'int'
	];

	protected $fillable = [
		'id',
		'evolved_species_id',
		'evolution_trigger_id',
		'version_group_id',
		'is_default',
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
		'turn_upside_down',
		'needs_multiplayer',
		'near_special_rock',
		'region_id',
		'required_pokemon_form_id',
		'evolved_pokemon_form_id',
		'used_move_id',
		'minimum_move_count',
		'minimum_steps',
		'minimum_damage_taken',
		'nature_bitmask',
		'condition_expression',
		'percentage_chance'
	];

	public function evolutionTrigger(): BelongsTo
	{
		return $this->belongsTo(EvolutionTrigger::class, 'evolution_trigger_id', 'id');
	}
}
