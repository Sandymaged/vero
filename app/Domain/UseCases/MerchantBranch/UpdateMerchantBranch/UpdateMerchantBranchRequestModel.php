<?php

namespace App\Domain\UseCases\MerchantBranch\UpdateMerchantBranch;

class UpdateMerchantBranchRequestModel
{
    private $attributes;
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

    public function getMerchantId()
    {
        return $this->attributes['merchant_id'] ?? null;
    }

    public function getLocation(): array
    {
        return $this->attributes['location'] ?? [];
    }

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }

    public function getImage(): string
    {
        return $this->attributes['image'] ?? '';
    }

    public function getImageRemove(): string
    {
        return $this->attributes['image_remove'] ?? '';
    }

    public function getResponsibleName(): string
    {
        return $this->attributes['responsible_name'] ?? '';
    }

    public function getResponsiblePhone(): string
    {
        return $this->attributes['responsible_phone'] ?? '';
    }
}
