<?php

namespace App\Domain\UseCases\Service\UpdateService;

class UpdateServiceRequestModel
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

    public function getParentId()
    {
        return $this->attributes['parent_id'] ?? null;
    }

    public function getStateId()
    {
        return $this->attributes['state_id'] ?? null;
    }

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }

    public function getIsService(): int
    {
        return $this->attributes['is_service'] ?? 0;
    }
}
