<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    const DEFAULT_LANGUAGE_ID = 6;

    public function list(Request $request): LengthAwarePaginator {
        $validatedData = $request->validate([
            'langId' => 'nullable|numeric',
            'typeIds' => 'array',
            'typeIds.*' => 'numeric',
            'perPage' => 'nullable|numeric',
        ]);

        $langId = $validatedData['langId'] ?? PokemonController::DEFAULT_LANGUAGE_ID;
        $name = $request->get('name', null);
        $typeIds = $validatedData['typeIds'] ?? [];
        $perPage = (int) ($validatedData['perPage'] ?? 50);
        $perPage = min(200, max(1, $perPage));

        $query = Pokemon::with(['speciesNames', 'types'])->whereNameLike($name)->whereLanguageId($langId)->whereTypeIn($typeIds);
        return $query->paginate($perPage);
    }

    public function show(string $identifier): Pokemon {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves.names', 'stats', 'types'])->where('identifier', '=', $identifier)->firstOrFail();
    }
}
