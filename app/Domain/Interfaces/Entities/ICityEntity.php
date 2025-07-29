<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\BooleanValueObject;

interface ICityEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getStateId(): int;

    public function setStateId(int $stateId): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;
}
