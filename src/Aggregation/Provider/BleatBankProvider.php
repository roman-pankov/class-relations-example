<?php

declare(strict_types=1);

namespace App\Aggregation\Provider;

use App\Aggregation\Parser\CsvParser;
use App\Aggregation\Transport\EmailTransport;

class BleatBankProvider implements ProviderInterface
{
    public function __construct(
        private EmailTransport $emailTransport,
        private CsvParser $csvParser
    ) {
    }


    public function getRates(): array
    {
        $csvData = $this->emailTransport->getFileContent(
            'email@bleat_bank.ru',
            'password123',
            'rates.csv'
        );

        $data = $this->csvParser->parse($csvData);

        echo 'Получение данных из BleatBankProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
