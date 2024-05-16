<?php

declare(strict_types=1);

namespace App\Inheritance\Provider;

class CbrfProvider extends AbstractProvider
{

    public function getRates(): array
    {
        $json = $this->makeHttpRequest('https://cbrf.ru/rates.json');
        $data = $this->parseData($json);

        echo 'Получение данных из CbrfProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
