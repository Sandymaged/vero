<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IServiceEntity;

interface IServiceFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IServiceEntity;
}
