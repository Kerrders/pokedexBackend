<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonType
 *
 * @property int $pokemon_id
 * @property int $type_id
 * @property int $slot
 *
 * @package App\Models
 */
class PokemonType extends Model
{
    use Cachable;

	protected $table = 'pokemon_types';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pokemon_id' => 'int',
		'type_id' => 'int',
		'slot' => 'int'
	];

	protected $fillable = [
		'pokemon_id',
		'type_id',
		'slot'
	];
}
