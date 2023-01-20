<?php

use App\Models\Move;
use App\Models\Pokemon;
use App\Models\PokemonEvolution;
use App\Models\PokemonSpecy;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokemon', function () {
    return Pokemon::with(['species.evolution', 'speciesNames', 'moves'])->paginate(25);
});
Route::get('/pokemon/{id}', function ($id) {
    return Pokemon::with(['species.evolution', 'speciesNames', 'moves'])->where('id', '=', $id)->firstOrFail();
});

Route::get('/evolution/{id}', function ($id) {
    return PokemonSpecy::where('evolution_chain_id', '=', $id)->get()->map(function ($pokemon) {
        $pokemon->evolution = PokemonEvolution::where('evolved_species_id', '=', $pokemon->id)->first();
        return $pokemon;
    });
});

Route::get('/move', function () {
    return Move::with(['names'])->get();
});
Route::get('/move/{id}', function ($id) {
    return Move::with(['names'])->where('id', '=', $id)->firstOrFail();
});
