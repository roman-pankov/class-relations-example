<?php

declare(strict_types=1);

namespace App\Aggregation\Provider;

use App\Aggregation\Parser\JsonParser;
use App\Aggregation\Transport\HttpTransport;

class CbrfProvider implements ProviderInterface
{

    public function __construct(
        private HttpTransport $httpTransport,
        private JsonParser $parser,
    ) {
    }

    public function getRates(): array
    {
        $json = $this->httpTransport->doRequest('https://cbrf.ru/rates.json');

        $data = $this->parser->parse($json);

        echo 'Получение данных из CbrfProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
