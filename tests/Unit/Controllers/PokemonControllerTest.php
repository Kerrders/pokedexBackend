<?php

namespace Tests\Unit\Controllers;

use App\Models\Pokemon;
use App\Http\Controllers\PokemonController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;

class PokemonControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testList()
    {
        $pokemon = Pokemon::factory()->count(10)->make();

        $paginator = new LengthAwarePaginator($pokemon,count($pokemon),10);

        $controllerMock = $this->createMock(PokemonController::class);
        $controllerMock->method('list')->willReturn($paginator);

        $request = new Request();
        $result = $controllerMock->list($request);

        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $this->assertEquals(10, $result->total());
    }

    public function testShow()
    {
        $pokemon = Pokemon::factory()->make();

        $controllerMock = $this->createMock(PokemonController::class);
        $controllerMock->method('show')->willReturn($pokemon);

        $result = $controllerMock->show($pokemon->identifier);

        $this->assertInstanceOf(Pokemon::class, $result);
        $this->assertEquals($pokemon->identifier, $result->identifier);
    }
}
