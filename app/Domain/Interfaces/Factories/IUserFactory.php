<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\IUserEntity;

interface IUserFactory
{
    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): IUserEntity;
}
