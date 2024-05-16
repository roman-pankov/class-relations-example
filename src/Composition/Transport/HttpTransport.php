<?php

declare(strict_types=1);

namespace App\Composition\Transport;

class HttpTransport
{
    public function doRequest(string $url): string
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
}
