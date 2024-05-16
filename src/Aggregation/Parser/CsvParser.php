<?php

declare(strict_types=1);

namespace App\Aggregation\Parser;

class CsvParser
{
    public function parse(string $csvData): array
    {
        $parsedData = [];
        foreach (explode("\n", $csvData) as $row) {
            $parsedRow = str_getcsv($row);
            $parsedData[] = [
                'title' => $parsedRow[0],
                'price' => $parsedRow[1],
            ];
        }

        return $parsedData;
    }
}
