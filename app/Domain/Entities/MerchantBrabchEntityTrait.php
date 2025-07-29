<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\LocationValueObject;

trait MerchantBrabchEntityTrait
{
    // IMerchantBranchEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getImage(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['image'], self::IMAGE_DIR);
    }

    public function setImage(ImageValueObject $image): void
    {
        $this->attributes['image'] = $image;
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

    public function getMerchantId(): int
    {
        return $this->attributes['merchant_id'];
    }

    public function setMerchantId(int $merchantId): void
    {
        $this->attributes['merchant_id'] = $merchantId;
    }

    public function getResponsibleName(): string
    {
        return $this->attributes['responsible_name'];
    }

    public function setResponsibleName(string $responsibleName): void
    {
        $this->attributes['responsible_name'] = $responsibleName;
    }

    public function getResponsiblePhone(): string
    {
        return $this->attributes['responsible_phone'];
    }

    public function setResponsiblePhone(string $responsiblePhone): void
    {
        $this->attributes['responsiblePhone'] = $responsiblePhone;
    }
}
