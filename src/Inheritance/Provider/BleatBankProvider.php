<?php

declare(strict_types=1);

namespace App\Inheritance\Provider;

class BleatBankProvider extends AbstractProvider
{

    public function getRates(): array
    {
        $fileContent = $this->getFileContentFromMail(
            'email@bleat_bank.ru',
            'password123',
            'rates.csv'
        );

        $data = $this->parseData($fileContent);

        echo 'Получение данных из BleatBankProvider<br>';
        echo '<pre>';
        echo print_r($data, true);
        echo '</pre>';

        return $data;
    }

    protected function parseData(string $data): array
    {
        $parsedData = [];
        foreach (explode("\n", $data) as $row) {
            $parsedRow = str_getcsv($row);
            $parsedData[] = [
                'title' => $parsedRow[0],
                'price' => $parsedRow[1],
            ];
        }

        return $parsedData;
    }

    private function getFileContentFromMail(string $mail, string $password, string $fileName): string
    {
        /*
         * ТУТ КОД ПОЛУЧЕНИЯ ФАЙЛА С ПОЧТЫ
         */

        // Допустим получили файл с почты и вернули его содержимое
        return <<<CSV
"USD to RUB",0.9
"EUR to RUB",1.1
CSV;
    }
}
