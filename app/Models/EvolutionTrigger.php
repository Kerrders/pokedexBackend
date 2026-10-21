<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class EvolutionTrigger
 *
 * @property int $id
 * @property string $identifier
 *
 * @package App\Models
 */
class EvolutionTrigger extends Model
{
    use Cachable;

    protected $table = 'evolution_triggers';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'id',
        'identifier',
    ];

    public function prose(): HasMany
    {
        return $this->hasMany(EvolutionTriggerProse::class, 'evolution_trigger_id', 'id');
    }
}
