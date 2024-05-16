<?php

declare(strict_types=1);

namespace App\Composition;

use App\Composition\Provider\BleatBankProvider;
use App\Composition\Provider\CbrfProvider;
use App\Composition\Provider\ProviderInterface;
use App\Composition\Provider\SberbankProvider;
use App\Composition\Repository\RatesRepository;

class Service
{
    private RatesRepository $repository;

    /** @var ProviderInterface[] */
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
