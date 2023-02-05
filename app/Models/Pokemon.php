<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pokemon
 *
 * @property int $id
 * @property string $identifier
 * @property int $species_id
 * @property int $height
 * @property int $weight
 * @property int $base_experience
 * @property int $order
 * @property int $is_default
 *
 * @package App\Models
 */
class Pokemon extends Model
{
    use HasFactory;

	protected $table = 'pokemon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'species_id' => 'int',
		'height' => 'int',
		'weight' => 'int',
		'base_experience' => 'int',
		'order' => 'int',
		'is_default' => 'int'
	];

	protected $fillable = [
		'id',
		'identifier',
		'species_id',
		'height',
		'weight',
		'base_experience',
		'order',
		'is_default'
	];

    /**
     * Get species
     */
    public function species()
    {
        return $this->hasOne(PokemonSpecy::class, 'id', 'species_id');
    }

    /**
     * Get species name
     */
    public function speciesNames()
    {
        return $this->hasMany(PokemonSpeciesName::class, 'pokemon_species_id', 'species_id');
    }

    /**
     * Get moves
     */
    public function moves()
    {
        return $this->hasMany(PokemonMove::class, 'pokemon_id', 'id');
    }

    /**
     * Get stats
     */
    public function stats()
    {
        return $this->hasMany(PokemonStat::class, 'pokemon_id', 'id');
    }
}
