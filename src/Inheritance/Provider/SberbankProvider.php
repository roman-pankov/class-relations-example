<?php

declare(strict_types=1);

namespace App\Inheritance\Provider;

class SberbankProvider extends AbstractProvider
{
    public function getRates(): array
    {
        $json = $this->makeHttpRequest('https://sberbank.ru/rates.json');
        $data = $this->parseData($json);

        echo 'Получение данных из SberbankProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
