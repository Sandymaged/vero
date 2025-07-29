<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;

interface IMerchantBranchEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getStateId(): int;

    public function setStateId(int $stateId): void;

    public function getMerchantId(): int;

    public function setMerchantId(int $merchantId): void;

    public function getResponsibleName(): string;

    public function setResponsibleName(string $responsibleName): void;

    public function getResponsiblePhone(): string;

    public function setResponsiblePhone(string $responsiblePhone): void;

    public function getImage(): ImageValueObject;

    public function setImage(ImageValueObject $image): void;

    public function getLocation(): LocationValueObject;

    public function setLocation(LocationValueObject $location): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;
}
