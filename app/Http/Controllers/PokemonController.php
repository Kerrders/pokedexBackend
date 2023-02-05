<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PokemonController extends Controller
{
    public function list(): LengthAwarePaginator {
        return Pokemon::with(['speciesNames'])->paginate(50);
    }

    public function show(string $identifier): Pokemon {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves.names'])->where('identifier', '=', $identifier)->firstOrFail();
    }
}
