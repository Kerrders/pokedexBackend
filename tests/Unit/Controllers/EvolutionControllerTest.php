<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\EvolutionController;
use App\Models\PokemonEvolution;
use App\Models\PokemonSpecy;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class EvolutionControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function testList()
    {
        $pokemonSpecy1 = PokemonSpecy::factory()->create(['evolution_chain_id' => 1]);
        $pokemonSpecy2 = PokemonSpecy::factory()->create(['evolution_chain_id' => 1]);
        PokemonEvolution::factory()->create(['evolved_species_id' => $pokemonSpecy2->id]);

        $mock = Mockery::mock(EvolutionController::class);
        $mock->shouldReceive('show')->with(1)->andReturn(collect([$pokemonSpecy1, $pokemonSpecy2]));

        $result = $mock->show(1);

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(2, $result);

        $this->assertEquals($pokemonSpecy1->id, $result[0]->id);
        $this->assertEquals(1, $result[0]->evolution_chain_id);

        $this->assertEquals($pokemonSpecy2->id, $result[1]->id);
        $this->assertEquals(1, $result[1]->evolution_chain_id);
    }
}
