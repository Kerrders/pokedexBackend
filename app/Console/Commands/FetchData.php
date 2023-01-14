<?php

namespace App\Console\Commands;

use App\Http\Interfaces\CsvRepositoryInterface;
use Illuminate\Console\Command;

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
     * Summary of filesToLoad
     * @var array
     */
    private array $filesToLoad = [
        "moves",
        "move_names",
        "pokemon_species",
        "pokemon_species_names",
        "versions",
        "version_names",
        "version_groups",
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CsvRepositoryInterface $csvRepository)
    {
        foreach ($this->filesToLoad as $fileName) {
            $this->info(sprintf('Fetching %s...', $fileName));
            $content = file_get_contents(sprintf('https://raw.githubusercontent.com/PokeAPI/pokeapi/master/data/v2/csv/%s.csv', $fileName));
            $data = $csvRepository->parse($content);
            $this->createJsonFile($fileName, $data);
            $this->info(sprintf('%s successfully fetched', $fileName));
        }
        return Command::SUCCESS;
    }

    private function createJsonFile(string $fileName, array $data): void {
        $path = sprintf('storage/app/%s.json', $fileName);
        $jsonString = json_encode($data);

        $fp = fopen($path, 'w');
        fwrite($fp, $jsonString);
        fclose($fp);
    }
}
