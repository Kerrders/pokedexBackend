<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\MoveController;
use App\Models\Move;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoveControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function testList()
    {
        $moves = Move::factory()->count(10)->make();

        $controllerMock = $this->createMock(MoveController::class);
        $controllerMock->method('list')->willReturn($moves);

        $result = $controllerMock->list();

        $this->assertEquals(10, $result->count());
    }

    /** @test */
    public function testShow()
    {
        $move = Move::factory()->make();

        $controllerMock = $this->createMock(MoveController::class);
        $controllerMock->method('show')->willReturn($move);

        $result = $controllerMock->show($move->id);

        $this->assertInstanceOf(Move::class, $result);
        $this->assertEquals($move->id, $result->id);
    }
}
