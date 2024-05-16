<?php

declare(strict_types=1);

namespace App\Inheritance;

use App\Inheritance\Provider\AbstractProvider;
use App\Inheritance\Provider\BleatBankProvider;
use App\Inheritance\Provider\CbrfProvider;
use App\Inheritance\Provider\SberbankProvider;
use App\Inheritance\Repository\RatesRepository;

class Service
{
    private RatesRepository $repository;

    /** @var AbstractProvider[] */
    private array $providers = [];

    public function __construct()
    {
        $this->repository = new RatesRepository();

        $this->providers[] = new CbrfProvider();
        $this->providers[] = new SberbankProvider();
        $this->providers[] = new BleatBankProvider();
    }

    public function refreshRates(): void
    {
        foreach ($this->providers as $provider) {
            $rates = $provider->getRates();

            // Сохраняем полученные данные в базу
            $this->repository->save($rates);
        }
    }
}
