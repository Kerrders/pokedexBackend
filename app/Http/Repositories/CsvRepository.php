<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CsvRepositoryInterface;

class CsvRepository implements CsvRepositoryInterface {
    public function parse(string $content, string $separator = ','): array {
        $header = null;
        $data = [];
        $handle = fopen("php://memory", "w+");
        fwrite($handle, $content);
        rewind($handle);
        while (($row = fgetcsv($handle, 0, $separator)) !== false) {
            $row = array_map(function($val) {
                return empty($val) ? null : $val;
            }, $row);
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);
        return $data;
    }
}
