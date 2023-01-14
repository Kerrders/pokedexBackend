<?php

namespace App\Http\Interfaces;

interface CsvRepositoryInterface
{
    /**
     * Parse csv string to array
     *
     * @param string $content
     * @param string $seperator (optional)
     */
    public function parse(string $content, string $separator = ','): array;
}
