<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\BooleanValueObject;

interface ICategoryEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getStateId(): int;

    public function setStateId(int $stateId): void;

    public function getParentId(): int;

    public function setParentId(int $parentId): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;

    public function getIsService(): BooleanValueObject;

    public function setIsService(BooleanValueObject $boolean): void;
}
