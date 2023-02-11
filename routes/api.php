<?php

use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokemonTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function () {
    Route::get('/pokemon', [PokemonController::class, 'list']);
    Route::get('/pokemon/{identifier}', [PokemonController::class, 'show']);

    Route::get('/evolution/{id}', [EvolutionController::class, 'show']);

    Route::get('/move', [MoveController::class, 'list']);
    Route::get('/move/{id}', [MoveController::class, 'show']);

    Route::get('/typeEffectiveness', [PokemonTypeController::class, 'list']);
});
