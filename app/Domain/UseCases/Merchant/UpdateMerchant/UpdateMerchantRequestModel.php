<?php

namespace App\Domain\UseCases\Merchant\UpdateMerchant;

class UpdateMerchantRequestModel
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

    public function getEmail(): string
    {
        return $this->attributes['email'] ?? '';
    }

    public function getStateId(): string
    {
        return $this->attributes['state_id'] ?? '';
    }

    public function getDepositPercentage(): float
    {
        return $this->attributes['deposit_percentage'] ?? 0.00;
    }

    public function getType(): string
    {
        return $this->attributes['type'] ?? '';
    }

    public function getLogo(): string
    {
        return $this->attributes['logo'] ?? '';
    }

    public function getLogoRemove(): string
    {
        return $this->attributes['logo_remove'] ?? '';
    }

    public function getImage(): string
    {
        return $this->attributes['image'] ?? '';
    }

    public function getImageRemove(): string
    {
        return $this->attributes['image_remove'] ?? '';
    }

    public function getVideoUrl(): string
    {
        return $this->attributes['video_url'] ?? '';
    }

    public function getLocation(): array
    {
        return $this->attributes['location'] ?? [];
    }

    public function getAdminName(): string
    {
        return $this->attributes['admin_name'] ?? '';
    }

    public function getReservationsResponsibleName(): string
    {
        return $this->attributes['reservations_responsible_name'] ?? '';
    }

    public function getAdminPhone(): string
    {
        return $this->attributes['admin_phone'] ?? '';
    }

    public function getReservationsResponsiblePhone(): string
    {
        return $this->attributes['reservations_responsible_phone'] ?? '';
    }

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }
}
