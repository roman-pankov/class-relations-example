<?php

declare(strict_types=1);

namespace App\Composition\Provider;

use App\Composition\Parser\CsvParser;
use App\Composition\Transport\EmailTransport;

class BleatBankProvider implements ProviderInterface
{
    private EmailTransport $emailTransport;
    private CsvParser $csvParser;

    public function __construct()
    {
        $this->emailTransport = new EmailTransport();
        $this->csvParser = new CsvParser();
    }


    public function getRates(): array
    {
        $csvData = $this->emailTransport->getFileContent(
            'email@bleat_bank.ru',
            'password123',
            'rates.csv'
        );

        $data =  $this->csvParser->parse($csvData);

        echo 'Получение данных из BleatBankProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }
}
