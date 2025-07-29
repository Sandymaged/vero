<?php

namespace App\Domain\UseCases\City\UpdateCity;

class UpdateCityRequestModel
{

    /**
     * @param array<mixed> $attributes
     */
    public function __construct(
         array $attributes
    )
    {
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getStateId()
    {
        return $this->attributes['state_id'] ?? null;
    }

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }
}
