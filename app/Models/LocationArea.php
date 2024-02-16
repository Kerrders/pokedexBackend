<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationArea
 *
 * @property int $id
 * @property int $location_id
 * @property int $game_index
 * @property string $identifier
 *
 * @package App\Models
 */
class LocationArea extends Model
{
    use Cachable;

	protected $table = 'location_areas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'location_id' => 'int',
		'game_index' => 'int',
        'identifier' => 'string'
	];

	protected $fillable = [
		'id',
		'location_id',
		'game_index',
        'identifier'
	];

    /**
     * Get move names
     */
    public function names()
    {
        return $this->hasMany(LocationName::class, 'location_id', 'location_id');
    }
}
