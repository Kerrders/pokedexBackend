<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonEncounter
 *
 * @property int $id
 * @property int $version_id
 * @property int $location_area_id
 * @property int $encounter_slot_id
 * @property int $pokemon_id
 * @property int $min_level
 * @property int $max_level
 *
 * @package App\Models
 */
class PokemonEncounter extends Model
{
    use Cachable;

	protected $table = 'pokemon_encounters';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'version_id' => 'int',
		'location_area_id' => 'int',
        'encounter_slot_id' => 'int',
        'pokemon_id' => 'int',
        'min_level' => 'int',
        'max_level' => 'int'
	];

	protected $fillable = [
		'id',
		'version_id',
		'location_area_id',
        'encounter_slot_id',
        'pokemon_id',
        'min_level',
        'max_level'
	];

    /**
     * Get move names
     */
    public function location()
    {
        return $this->hasOne(LocationArea::class, 'id', 'location_area_id');
    }
}
