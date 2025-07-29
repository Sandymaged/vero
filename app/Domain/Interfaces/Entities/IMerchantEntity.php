<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use App\ValueObjects\UrlValueObject;

interface IMerchantEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getStateId(): int;

    public function setStateId(int $stateId): void;

    public function getDepositPercentage(): float;

    public function setDepositPercentage(float $depositPercentage): void;

    public function getAdminName(): string;

    public function setAdminName(string $adminName): void;

    public function getReservationsResponsibleName(): string;

    public function setReservationsResponsibleName(string $reservationsResponsibleName): void;

    public function getAdminPhone(): string;

    public function setAdminPhone(string $adminPhone): void;

    public function getReservationsResponsiblePhone(): string;

    public function setReservationsResponsiblePhone(string $reservationsResponsiblePhone): void;

    public function getEmail(): EmailValueObject;

    public function setEmail(EmailValueObject $email): void;

    public function getVideoUrl(): UrlValueObject;

    public function setVideoUrl(UrlValueObject $videoUrl): void;

    public function getLogo(): ImageValueObject;

    public function setLogo(ImageValueObject $logo): void;

    public function getImage(): ImageValueObject;

    public function setImage(ImageValueObject $image): void;

    public function getLocation(): LocationValueObject;

    public function setLocation(LocationValueObject $location): void;

    public function getType(): MerchantTypeValueObject;

    public function setType(MerchantTypeValueObject $type): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;
}
