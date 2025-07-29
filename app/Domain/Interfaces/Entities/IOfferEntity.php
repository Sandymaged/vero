<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\OfferTypeValueObject;
use App\ValueObjects\UrlValueObject;

interface IOfferEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getNotes(): string;

    public function setNotes(string $notes): void;

    public function getExtraDetails(): string;

    public function setExtraDetails(string $extraDetails): void;

    public function getMerchantId(): int;

    public function setMerchantId(int $merchantId): void;

    public function getMerchantBranchId(): int;

    public function setMerchantBranchId(int $merchantBranch): void;

    public function getCategoryId(): int;

    public function setCategoryId(int $subcategoryId): void;

    public function getSubcategoryId(): int;

    public function setSubcategoryId(int $subcategoryId): void;

    public function getApplicationPercentage(): float;

    public function setApplicationPercentage(float $applicationPercentage): void;

    public function getPrice(): float;

    public function setPrice(float $price): void;

    public function getImage(): ImageValueObject;

    public function setImage(ImageValueObject $image): void;

    public function getType(): OfferTypeValueObject;

    public function setType(OfferTypeValueObject $type): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;

    public function getVideoUrl(): UrlValueObject;

    public function setVideoUrl(UrlValueObject $videoUrl): void;
}
