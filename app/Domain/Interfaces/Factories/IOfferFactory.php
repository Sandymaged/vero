<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IOfferEntity;

interface IOfferFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IOfferEntity;
}
