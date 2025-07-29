<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\ICityEntity;

interface ICityFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): ICityEntity;
}
