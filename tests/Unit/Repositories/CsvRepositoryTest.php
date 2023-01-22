<?php

namespace Tests\Unit\Repositories;

use App\Http\Repositories\CsvRepository;
use PHPUnit\Framework\TestCase;

class CsvRepositoryTest extends TestCase
{
    private $repository;

    public function setUp(): void {
        parent::setUp();
        $this->repository = app(CsvRepository::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_parse_csv_string()
    {
        $csvString = "name,id,food\r\nquincy,1,hot dogs";

        $data = $this->repository->parse($csvString);
        $this->assertIsArray($data);
        $this->assertEquals(1, count($data));
        $this->assertEquals('quincy', $data[0]['name']);
        $this->assertEquals('1', $data[0]['id']);
        $this->assertEquals('hot dogs', $data[0]['food']);
    }
}
