<?php

declare(strict_types=1);

namespace App\Composition\Provider;

use App\Composition\Parser\JsonParser;
use App\Composition\Transport\HttpTransport;

class SberbankProvider implements ProviderInterface
{
    private HttpTransport $httpTransport;
    private JsonParser $parser;

    public function __construct()
    {
        $this->httpTransport = new HttpTransport();
        $this->parser = new JsonParser();
    }

    public function getRates(): array
    {
        $json = $this->httpTransport->doRequest('https://sberbank.ru/rates.json');

        $data = $this->parser->parse($json);

        echo 'Получение данных из SberbankProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
