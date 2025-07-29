<?php

namespace App\Domain\Interfaces\Entities;

interface IPermissionEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getGuardName(): string;

    public function setGuardName(string $name): void;

}
