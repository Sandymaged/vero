<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IAdminEntity;

interface IAdminFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IAdminEntity;
}
