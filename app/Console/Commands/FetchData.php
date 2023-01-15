<?php

namespace App\Console\Commands;

use App\Http\Interfaces\CsvRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all data from the pokemon api and store it';


    /**
     * List of files to load
     * @var array
     */
    private array $filesToLoad = [
        "pokemon",
        "pokemon_species",
        "pokemon_species_names",
        "moves",
        "move_names",
        "types",
        "type_names"
    ];

    /**
     * @var array
     */
    private array $data;

    /**
     * @var array
     */
    private array $mappedData;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CsvRepositoryInterface $csvRepository, Client $client)
    {
        foreach ($this->filesToLoad as $fileName) {
            $this->info(sprintf('Fetching %s...', $fileName));
            $response = $client->get(sprintf('https://raw.githubusercontent.com/PokeAPI/pokeapi/master/data/v2/csv/%s.csv', $fileName), ['verify' => false]);
            $content = $response->getBody()->getContents();
            $this->data[$fileName] = collect($csvRepository->parse($content));
            $this->info(sprintf('%s successfully fetched', $fileName));
        }

        $this->info("\n" . 'Mapping data...');
        $this->mapPokemonData();
        $this->mapPokemonMoveData();
        $this->mapPokemonTypeData();

        $this->info("\n" . 'Save data to files...');
        $this->saveData();
        return Command::SUCCESS;
    }

    private function mapPokemonData(): void {
        $this->mappedData['pokemon'] = $this->data['pokemon']->map(function ($data) {
            $data['species'] = collect($this->data['pokemon_species'])->firstWhere('identifier', $data['identifier']);
            $data['species_names'] = $this->mapPokemonSpeciesNames($data['species_id']);
            return $data;
        });
    }

    private function mapPokemonSpeciesNames(int $speciesId) {
        return collect($this->data['pokemon_species_names'])->where('pokemon_species_id', $speciesId)->map(function ($speciesName) {
            return [
                "local_language_id" => $speciesName['local_language_id'],
                "name" => $speciesName['name'],
                "genus" => $speciesName['genus']
            ];
        });
    }

    private function mapPokemonMoveData(): void {
        $this->mappedData['moves'] = $this->data['moves']->map(function ($data) {
            $data['move_names'] = collect($this->data['move_names'])->where('move_id', $data['id']);
            return $data;
        });
    }

    private function mapPokemonTypeData(): void {
        $this->mappedData['types'] = $this->data['types']->map(function ($data) {
            $data['type_names'] = collect($this->data['type_names'])->where('type_id', $data['id']);
            return $data;
        });
    }

    private function saveData(): void {
        foreach ($this->mappedData as $name => $data) {
            $this->createJsonFile($name, $data);
        }
    }

    private function createJsonFile(string $fileName, Collection $data): void {
        $path = sprintf('storage/app/%s.json', $fileName);

        $fp = fopen($path, 'w');
        fwrite($fp, $data->toJson());
        fclose($fp);
        $this->info(sprintf('%s.json file created', $fileName));
    }
}
