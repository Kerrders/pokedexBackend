<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonEvolution;
use App\Models\PokemonSpecy;
use Illuminate\Database\Eloquent\Collection;

class EvolutionController extends Controller
{
    public function show(int $id): Collection {
        return PokemonSpecy::where('evolution_chain_id', '=', $id)->get()->map(function ($pokemon) {
            $pokemon->evolution = PokemonEvolution::where('evolved_species_id', '=', $pokemon->id)->first();
            return $pokemon;
        });
    }
}
