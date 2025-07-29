<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IRoleEntity;

interface IRoleFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IRoleEntity;
}
