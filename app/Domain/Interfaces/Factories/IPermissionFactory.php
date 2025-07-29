<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IPermissionEntity;

interface IPermissionFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IPermissionEntity;
}
