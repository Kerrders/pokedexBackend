<?php

namespace App\Http\Controllers;

use App\Models\PokemonEvolution;
use App\Models\PokemonSpecy;
use Illuminate\Support\Collection;

class EvolutionController extends Controller
{
    public function show(int $id): Collection {
        return PokemonSpecy::with('names')->where('evolution_chain_id', '=', $id)->get()->map(function ($pokemon) {
            $pokemon->evolution = PokemonEvolution::where('evolved_species_id', '=', $pokemon->id)->first();
            return $pokemon;
        });
    }
}
