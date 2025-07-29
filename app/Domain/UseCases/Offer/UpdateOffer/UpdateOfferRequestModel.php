<?php

namespace App\Domain\UseCases\Offer\UpdateOffer;

class UpdateOfferRequestModel
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

    public function getMerchantBranchId()
    {
        return $this->attributes['merchant_branch_id'] ?? null;
    }

    public function getMerchantId()
    {
        return $this->attributes['merchant_id'] ?? null;
    }

    public function getCategoryId()
    {
        return $this->attributes['category_id'] ?? null;
    }
    public function getSubcategoryId()
    {
        return $this->attributes['subcategory_id'] ?? null;
    }
    public function getServiceId()
    {
        return $this->attributes['service_id'] ?? null;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'] ?? [];
    }

    public function getApplicationPercentage(): float
    {
        return $this->attributes['application_percentage'] ?? [];
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

    public function getExtraDetails(): string
    {
        return $this->attributes['extra_details'] ?? '';
    }

    public function getNotes(): string
    {
        return $this->attributes['notes'] ?? '';
    }

    public function getType(): string
    {
        return $this->attributes['type'] ?? '';
    }

    public function getVideoUrl(): string
    {
        return $this->attributes['video_url'] ?? '';
    }
}
