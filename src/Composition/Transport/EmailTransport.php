<?php

declare(strict_types=1);

namespace App\Composition\Transport;

class EmailTransport
{
    public function getFileContent(string $email, string $password, string $filename): string
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
