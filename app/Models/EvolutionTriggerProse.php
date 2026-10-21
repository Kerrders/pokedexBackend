<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EvolutionTriggerProse
 *
 * @property int $evolution_trigger_id
 * @property int $local_language_id
 * @property string $name
 *
 * @package App\Models
 */
class EvolutionTriggerProse extends Model
{
    use Cachable;

    protected $table = 'evolution_trigger_prose';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'evolution_trigger_id' => 'int',
        'local_language_id' => 'int',
    ];

    protected $fillable = [
        'evolution_trigger_id',
        'local_language_id',
        'name',
    ];

    public function evolutionTrigger(): BelongsTo
    {
        return $this->belongsTo(EvolutionTrigger::class, 'evolution_trigger_id', 'id');
    }
}
