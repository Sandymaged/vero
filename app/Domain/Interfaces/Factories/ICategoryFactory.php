<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\ICategoryEntity;

interface ICategoryFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): ICategoryEntity;
}
