<?php

namespace App\Domain\Entities;


use App\Models\Merchant;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use App\ValueObjects\UrlValueObject;

trait MerchantEntityTrait
{
    // IMerchantEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): EmailValueObject
    {
        return new EmailValueObject($this->attributes['email']);
    }

    public function setEmail(EmailValueObject $email): void
    {
        $this->attributes['email'] = (string)$email;
    }

    public function getVideoUrl(): UrlValueObject
    {
        return new UrlValueObject($this->attributes['email']);
    }

    public function setVideoUrl(UrlValueObject $url): void
    {
        $this->attributes['video_url'] = (string)$url;
    }

    public function getLogo(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['logo']);
    }

    public function setLogo(ImageValueObject $logo): void
    {
        $this->attributes['logo'] = $logo;
    }

    public function getImage(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['image']);
    }

    public function setImage(ImageValueObject $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getType(): MerchantTypeValueObject
    {
        return new MerchantTypeValueObject($this->attributes['type']);
    }

    public function setType(MerchantTypeValueObject $type): void
    {
        $this->attributes['type'] = $type->getNumber();
    }

    public function getIsActive(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActive(BooleanValueObject $boolean): void
    {
        $this->attributes['is_active'] = $boolean->getNumber();
    }

    public function getLocation(): LocationValueObject
    {
        return new LocationValueObject($this->attributes['location']);
    }

    public function setLocation(LocationValueObject $location): void
    {
        $this->attributes['location'] = $location->point();
    }

    public function getStateId(): int
    {
        return $this->attributes['state_id'];
    }

    public function setStateId(int $stateId): void
    {
        $this->attributes['state_id'] = $stateId;
    }

    public function getDepositPercentage(): float
    {
        return $this->attributes['deposit_percentage'];
    }

    public function setDepositPercentage(float $depositPercentage): void
    {
        $this->attributes['deposit_percentage'] = $depositPercentage;
    }

    public function getAdminName(): string
    {
        return $this->attributes['admin_name'];
    }

    public function setAdminName(string $adminName): void
    {
        $this->attributes['admin_name'] = $adminName;
    }

    public function getAdminPhone(): string
    {
        return $this->attributes['admin_phone'];
    }

    public function setAdminPhone(string $adminPhone): void
    {
        $this->attributes['admin_phone'] = $adminPhone;
    }

    public function getReservationsResponsibleName(): string
    {
        return $this->attributes['reservations_responsible_name'];
    }

    public function setReservationsResponsibleName(string $reservationsResponsibleName): void
    {
        $this->attributes['reservations_responsible_name'] = $reservationsResponsibleName;
    }

    public function getReservationsResponsiblePhone(): string
    {
        return $this->attributes['reservations_responsible_phone'];
    }

    public function setReservationsResponsiblePhone(string $reservationsResponsiblePhone): void
    {
        $this->attributes['reservations_responsible_phone'] = $reservationsResponsiblePhone;
    }
}
