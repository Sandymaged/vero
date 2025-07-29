<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;

interface ISubcategoryFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): ISubcategoryEntity;
}
