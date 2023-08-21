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
        $name = $request->input('name');
        $typeIds = $validatedData['typeIds'] ?? [];
        $perPage = (int) ($validatedData['perPage'] ?? 50);
        $perPage = min(200, max(1, $perPage));

        $query = Pokemon::with(['speciesNames', 'types'])->whereLanguageId($langId)
            ->when($name, function ($query) use ($name) {
                return $query->whereNameLike($name);
            })
            ->when(!empty($typeIds), function ($query) use ($typeIds) {
                return $query->whereTypeIn($typeIds);
            });

        return $query->paginate($perPage);
    }

    public function show(string $identifier): Pokemon {
        return Pokemon::with(['species.evolution', 'speciesNames', 'moves.names', 'stats', 'types'])->where('identifier', '=', $identifier)->firstOrFail();
      }
}
