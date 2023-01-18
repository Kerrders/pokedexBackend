<?php

namespace Database\Seeders;

use App\Http\Interfaces\CsvRepositoryInterface;
use App\Models\Move;
use App\Models\MoveName;
use App\Models\Pokemon;
use App\Models\PokemonMove;
use App\Models\PokemonSpeciesName;
use App\Models\PokemonSpecy;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

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
        "move_names" => MoveName::class
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

            $data = collect($csvRepository->parse($content));
            foreach ($data as $entry) {
                $newModel = app($model);
                $newModel->fill($entry);
                $newModel->save();
            }
            $this->command->info(sprintf('%s successfully seeded', $fileName));
        }
    }
}
