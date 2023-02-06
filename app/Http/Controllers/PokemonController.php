<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    const DEFAULT_LANGUAGE_ID = 6;

    public function list(Request $request): LengthAwarePaginator {
        $langId = $request->get('langId', PokemonController::DEFAULT_LANGUAGE_ID);
        $name = $request->get('name', null);
        $perPage = (int) $request->get('perPage', 50);
        $perPage = min(200, max(1, $perPage));

        $query = Pokemon::with(['speciesNames'])->whereNameLike($name)->whereLanguageId($langId);
        return $query->paginate($perPage);
    }

    public function show(string $identifier): Pokemon {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves.names', 'stats'])->where('identifier', '=', $identifier)->firstOrFail();
    }
}
