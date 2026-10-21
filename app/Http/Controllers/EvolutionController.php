<?php

namespace App\Http\Controllers;

use App\Models\PokemonEvolution;
use App\Models\PokemonSpecy;
use Illuminate\Support\Collection;

class EvolutionController extends Controller
{
    public function show(int $id): Collection {
        return PokemonSpecy::with('names')->where('evolution_chain_id', '=', $id)->get()->map(function ($pokemon) {
            $pokemon->evolution = PokemonEvolution::with([
                'evolutionTriggerProse' => function ($query) {
                    $query->select('evolution_trigger_id', 'local_language_id', 'name')
                        ->whereIn('local_language_id', [6, 9]);
                },
            ])->where('evolved_species_id', '=', $pokemon->id)->first();
            return $pokemon;
        });
    }
}
