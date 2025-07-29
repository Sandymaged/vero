<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IStateEntity;

interface IStateFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IStateEntity;
}
