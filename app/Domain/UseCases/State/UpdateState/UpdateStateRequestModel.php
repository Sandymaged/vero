<?php

namespace App\Domain\UseCases\State\UpdateState;

class UpdateStateRequestModel
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

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }

    public function getCities(): array
    {
        return $this->attributes['cities'] ?? [];
    }

}
