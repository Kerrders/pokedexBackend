<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PokemonMove
 *
 * @property int $pokemon_id
 * @property int $version_group_id
 * @property int $move_id
 * @property int $pokemon_move_method_id
 * @property int $level
 * @property int $order
 *
 * @package App\Models
 */
class PokemonMove extends Model
{
    use Cachable;

	protected $table = 'pokemon_moves';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pokemon_id' => 'int',
		'version_group_id' => 'int',
		'move_id' => 'int',
		'pokemon_move_method_id' => 'int',
		'level' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'pokemon_id',
		'version_group_id',
		'move_id',
		'pokemon_move_method_id',
		'level',
		'order'
	];

    /**
     * Get move names
     */
    public function names()
    {
        return $this->hasMany(MoveName::class, 'move_id', 'move_id');
    }
}
