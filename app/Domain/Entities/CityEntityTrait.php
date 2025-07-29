<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;

trait CityEntityTrait
{
    // ICityEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getStateId(): int
    {
        return $this->attributes['state_id'];
    }

    public function setStateId(int $stateId): void
    {
        $this->attributes['state_id'] = $stateId;
    }

    public function getIsActive(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActive(BooleanValueObject $boolean): void
    {
        $this->attributes['is_active'] = $boolean->getNumber();
    }
}
