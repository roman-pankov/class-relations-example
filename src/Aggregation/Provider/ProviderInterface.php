<?php

namespace Provider;

namespace App\Aggregation\Provider;

interface ProviderInterface
{
    public function getRates(): array;
}
