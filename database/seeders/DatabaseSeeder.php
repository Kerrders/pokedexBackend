<?php

namespace Database\Seeders;

use App\Http\Interfaces\CsvRepositoryInterface;
use App\Models\LocationArea;
use App\Models\LocationName;
use App\Models\Move;
use App\Models\MoveName;
use App\Models\Pokemon;
use App\Models\PokemonEncounter;
use App\Models\PokemonEvolution;
use App\Models\PokemonMove;
use App\Models\PokemonSpeciesName;
use App\Models\PokemonSpecy;
use App\Models\PokemonStat;
use App\Models\PokemonType;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * List of files to load mapped to model
     * @var array
     */
    private array $filesToLoadMap = [
        "pokemon" => Pokemon::class,
        "pokemon_species" => PokemonSpecy::class,
        "pokemon_species_names" => PokemonSpeciesName::class,
        "pokemon_moves" => PokemonMove::class,
        "moves" => Move::class,
        "move_names" => MoveName::class,
        "pokemon_evolution" => PokemonEvolution::class,
        "pokemon_stats" => PokemonStat::class,
        "pokemon_types" => PokemonType::class,
        "encounters" => PokemonEncounter::class,
        "location_areas" => LocationArea::class,
        "location_names" => LocationName::class
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(CsvRepositoryInterface $csvRepository, Client $client)
    {
        foreach ($this->filesToLoadMap as $fileName => $model) {
            $this->command->info(sprintf('Seeding %s...', $fileName));
            $response = $client->get(sprintf('https://raw.githubusercontent.com/PokeAPI/pokeapi/master/data/v2/csv/%s.csv', $fileName), ['verify' => false]);
            $content = $response->getBody()->getContents();

            if(app($model)->first()) {
                $this->command->info(sprintf('%s skipped because already seeded', $fileName));
                continue;
            }

            // Parse CSV content into an array
            $data = $csvRepository->parse($content);

            // Insert data in chunks
            $chunkSize = 1000;
            $chunks = array_chunk($data, $chunkSize);
            $chunkCount = count($chunks);
            $insertedCount = 0;

            foreach ($chunks as $index => $chunk) {
                DB::table(app($model)->getTable())->insert($chunk);
                $insertedCount += count($chunk);
                $this->command->info(sprintf('Chunk %d/%d for %s successfully inserted. %d entries remaining.', $index + 1, $chunkCount, $fileName, count($data) - $insertedCount));
            }
            $this->command->info(sprintf('%s successfully seeded', $fileName));
        }
    }
}
