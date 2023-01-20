<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Database\Eloquent\Collection;

class MoveController extends Controller
{
    public function list(): Collection {
        return Move::with(['names'])->get();
    }

    public function show(int $id): Move {
        return Move::with(['names'])->where('id', '=', $id)->firstOrFail();
    }
}
