<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;

trait StateEntityTrait
{
    // IStateEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
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
