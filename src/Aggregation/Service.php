<?php

declare(strict_types=1);

namespace App\Aggregation;

use App\Aggregation\Provider\BleatBankProvider;
use App\Aggregation\Provider\CbrfProvider;
use App\Aggregation\Provider\ProviderInterface;
use App\Aggregation\Provider\SberbankProvider;
use App\Aggregation\Repository\RatesRepository;

class Service
{
    /**
     * @param RatesRepository     $repository
     * @param ProviderInterface[] $providers
     */
    public function __construct(
        private RatesRepository $repository,
        private array $providers,
    ) {
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
