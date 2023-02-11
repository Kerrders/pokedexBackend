<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PokemonTypeHelper;

class PokemonTypeController extends Controller
{
    public function list() {
        $result = [];
        foreach (array_keys(PokemonTypeHelper::$weaknessTypeChart) as $type) {
            $result[$type] = PokemonTypeHelper::calculateEffectivenessForType($type);
        }
        return $result;
    }
}
