<?php

declare(strict_types=1);

namespace App\Inheritance\Provider;

abstract class AbstractProvider
{
    protected function makeHttpRequest(string $url): string
    {
        /*
         * ТУТ КОД HTTP ЗАПРОСА
         */

        // Допустим, что был HTTP запрос и вернулся JSON
        return <<<JSON
            [
                {
                    "title": "USD to RUB",
                    "price": 0.9
                },
                {
                    "title": "EUR to RUB",
                    "price": 1.1
                }
            ]
JSON;
    }

    protected function parseData(string $data): array
    {
        return json_decode($data, true);
    }

    abstract public function getRates(): array;
}
