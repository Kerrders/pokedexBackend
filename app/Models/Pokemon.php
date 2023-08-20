<?php

namespace App\Models;

use App\Http\Helpers\PokemonTypeHelper;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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
    use Cachable;

	protected $table = 'pokemon';
	public $incrementing = false;
	public $timestamps = false;
    protected $appends = ['typeEffectiveness'];


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

    public function types()
    {
        return $this->hasMany(PokemonType::class, 'pokemon_id', 'id');
    }

    public function scopeWhereNameLike($query, $name) {
        if(!$name) {
            return $query;
        }
        return $query->whereHas('speciesNames', function ($speciesNameQuery) use($name){
            $speciesNameQuery->where('name', 'like', '%'.$name.'%');
        });
    }

    public function scopeWhereLanguageId($query, $langId) {
        return $query->whereHas('speciesNames', function ($speciesNameQuery) use($langId){
            $speciesNameQuery->where('local_language_id', '=', $langId);
        });
    }

    public function scopeWhereTypeIn($query, $types) {
        if (empty($types)) {
            return $query;
        }

        return $query->whereHas('types', function ($typeQuery) use ($types) {
            $typeQuery->whereIn('type_id', $types);
        });
    }

    public function getTypeEffectivenessAttribute()
    {
        $type1 = $this->types->first();
        $type2 = $this->types->get(1) ?? null;
        $cacheKey = 'typeEffectiveness_' . $type1->type_id;

        if ($type2) {
            $cacheKey .= '_' . $type2->type_id;
        }

        return Cache::rememberForever($cacheKey, function () use ($type1, $type2) {
            return PokemonTypeHelper::calculateEffectivenessForType($type1->type_id, $type2 ? $type2->type_id : null);
        });
    }

}
