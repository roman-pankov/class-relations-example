<?php

declare(strict_types=1);

namespace App\Aggregation\Parser;

class JsonParser
{
    public function parse(string $json): array
    {
        return json_decode($json, true);
    }
}
