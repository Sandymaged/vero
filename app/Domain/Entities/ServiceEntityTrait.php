<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;

trait ServiceEntityTrait
{
    // IServiceEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getIsService(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_service']);
    }

    public function setIsService(BooleanValueObject $boolean): void
    {
        $this->attributes['is_service'] = $boolean->getNumber();
    }

    public function getIsActive(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActive(BooleanValueObject $boolean): void
    {
        $this->attributes['is_active'] = $boolean->getNumber();
    }

    public function getStateId(): int
    {
        return $this->attributes['state_id'];
    }

    public function setStateId(int $stateId): void
    {
        $this->attributes['state_id'] = $stateId ?: null;
    }

    public function getParentId(): int
    {
        return $this->attributes['parent_id'];
    }

    public function setParentId(int $stateId): void
    {
        $this->attributes['parent_id'] = $stateId;
    }
}
