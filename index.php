<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

// у нас схема создания классов упрощена
// создаем объекты вручную,
// но за это должен отвечать DI контейнер

echo '<h1>Наследование</h1>';
$service = new \App\Inheritance\Service();
$service->refreshRates();

echo '<h1>Композиция</h1>';
$service = new \App\Composition\Service();
$service->refreshRates();

echo '<h1>Агрегация</h1>';
$repository = new \App\Aggregation\Repository\RatesRepository();
$httpTransport = new \App\Aggregation\Transport\HttpTransport();
$emailTransport = new \App\Aggregation\Transport\EmailTransport();

$jsonParser = new \App\Aggregation\Parser\JsonParser();
$csvParser = new \App\Aggregation\Parser\CsvParser();

$providers = [
    new \App\Aggregation\Provider\CbrfProvider($httpTransport, $jsonParser),
    new \App\Aggregation\Provider\SberbankProvider($httpTransport, $jsonParser),
    new \App\Aggregation\Provider\BleatBankProvider($emailTransport, $csvParser),
];

$service = new \App\Aggregation\Service($repository, $providers);
$service->refreshRates();
