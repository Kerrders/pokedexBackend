<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationName
 *
 * @property int $location_id
 * @property int $local_language_id
 * @property string $name
 * @property string $subtitle
 *
 * @package App\Models
 */
class LocationName extends Model
{
    use Cachable;

	protected $table = 'location_names';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'location_id' => 'int',
		'local_language_id' => 'int',
		'name' => 'string',
        'subtitle' => 'string'
	];

	protected $fillable = [
		'location_id',
		'local_language_id',
		'name',
        'subtitle'
	];
}
