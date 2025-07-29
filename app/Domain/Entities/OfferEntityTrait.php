<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\OfferTypeValueObject;
use App\ValueObjects\UrlValueObject;

trait OfferEntityTrait
{
    // IOfferEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getNotes(): string
    {
        return $this->attributes['notes'];
    }

    public function setNotes(string $notes): void
    {
        $this->attributes['notes'] = $notes;
    }

    public function getExtraDetails(): string
    {
        return $this->attributes['extra_details'];
    }

    public function setExtraDetails(string $extraDetails): void
    {
        $this->attributes['extra_details'] = $extraDetails;
    }

    public function getType(): OfferTypeValueObject
    {
        return new OfferTypeValueObject($this->attributes['type']);
    }

    public function setType(OfferTypeValueObject $type): void
    {
        $this->attributes['type'] = $type->getNumber();
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

    public function getMerchantBranchId(): int
    {
        return $this->attributes['merchant_branch_id'];
    }

    public function setMerchantBranchId(int $merchantBranchId): void
    {
        $this->attributes['merchant_branch_id'] = $merchantBranchId;
    }

    public function getMerchantId(): int
    {
        return $this->attributes['merchant_id'];
    }

    public function setMerchantId(int $merchantId): void
    {
        $this->attributes['merchant_id'] = $merchantId;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function getSubcategoryId(): int
    {
        return $this->attributes['subcategory_id'];
    }

    public function setSubcategoryId(int $subcategoryId): void
    {
        $this->attributes['subcategory_id'] = $subcategoryId;
    }

    public function getServiceId(): int
    {
        return $this->attributes['service_id'];
    }

    public function setServiceId(int $serviceId): void
    {
        $this->attributes['service_id'] = $serviceId;
    }

    public function getApplicationPercentage(): float
    {
        return $this->attributes['application_percentage'];
    }

    public function setApplicationPercentage(float $applicationPercentage): void
    {
        $this->attributes['application_percentage'] = $applicationPercentage;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getVideoUrl(): UrlValueObject
    {
        return new UrlValueObject($this->attributes['email']);
    }

    public function setVideoUrl(UrlValueObject $url): void
    {
        $this->attributes['video_url'] = (string)$url;
    }
}
