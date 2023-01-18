<?php

use App\Models\Move;
use App\Models\Pokemon;
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
    return Pokemon::with(['species', 'speciesNames', 'moves'])->paginate(25);
});
Route::get('/pokemon/{id}', function ($id) {
    return Pokemon::with(['species', 'speciesNames', 'moves'])->where('id', '=', $id)->firstOrFail();
});

Route::get('/move', function () {
    return Move::with(['names'])->get();
});
Route::get('/move/{id}', function ($id) {
    return Move::with(['names'])->where('id', '=', $id)->firstOrFail();
});
