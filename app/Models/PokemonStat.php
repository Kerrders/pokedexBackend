<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonStat
 *
 * @property int|null $pokemon_id
 * @property int|null $stat_id
 * @property int|null $base_stat
 * @property int|null $effort
 *
 * @package App\Models
 */
class PokemonStat extends Model
{
	protected $table = 'pokemon_stats';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pokemon_id' => 'int',
		'stat_id' => 'int',
		'base_stat' => 'int',
		'effort' => 'int'
	];

	protected $fillable = [
		'pokemon_id',
		'stat_id',
		'base_stat',
		'effort'
	];
}
