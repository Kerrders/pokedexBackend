<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PokemonController extends Controller
{
    public function list(): LengthAwarePaginator {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves'])->paginate(25);
    }

    public function show(int $id): Pokemon {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves'])->where('id', '=', $id)->firstOrFail();
    }
}
