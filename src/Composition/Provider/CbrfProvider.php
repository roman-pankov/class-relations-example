<?php

declare(strict_types=1);

namespace App\Composition\Provider;

use App\Composition\Parser\JsonParser;
use App\Composition\Transport\HttpTransport;

class CbrfProvider implements ProviderInterface
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
        $json = $this->httpTransport->doRequest('https://cbrf.ru/rates.json');

        $data =  $this->parser->parse($json);

        echo 'Получение данных из CbrfProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
