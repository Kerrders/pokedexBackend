<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * Class Move
 *
 * @property int $id
 * @property string $identifier
 * @property int $generation_id
 * @property int $type_id
 * @property int $power
 * @property int $pp
 * @property int $accuracy
 * @property int $priority
 * @property int $target_id
 * @property int $damage_class_id
 * @property int $effect_id
 * @property string $effect_chance
 * @property int $contest_type_id
 * @property int $contest_effect_id
 * @property int $super_contest_effect_id
 *
 * @package App\Models
 */
class Move extends Model
{
    use HasFactory;
    use Cachable;

	protected $table = 'moves';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'generation_id' => 'int',
		'type_id' => 'int',
		'power' => 'int',
		'pp' => 'int',
		'accuracy' => 'int',
		'priority' => 'int',
		'target_id' => 'int',
		'damage_class_id' => 'int',
		'effect_id' => 'int',
		'contest_type_id' => 'int',
		'contest_effect_id' => 'int',
		'super_contest_effect_id' => 'int'
	];

	protected $fillable = [
		'id',
		'identifier',
		'generation_id',
		'type_id',
		'power',
		'pp',
		'accuracy',
		'priority',
		'target_id',
		'damage_class_id',
		'effect_id',
		'effect_chance',
		'contest_type_id',
		'contest_effect_id',
		'super_contest_effect_id'
	];

    /**
     * Get move names
     */
    public function names()
    {
        return $this->hasMany(MoveName::class, 'move_id', 'id');
    }
}
