<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoveName
 *
 * @property int $move_id
 * @property int $local_language_id
 * @property string $name
 *
 * @package App\Models
 */
class MoveName extends Model
{
    use Cachable;

	protected $table = 'move_names';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'move_id' => 'int',
		'local_language_id' => 'int'
	];

	protected $fillable = [
		'move_id',
		'local_language_id',
		'name'
	];
}
