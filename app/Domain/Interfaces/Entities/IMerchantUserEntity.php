<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\EmailValueObject;
use App\ValueObjects\HashedPasswordValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;

interface IMerchantUserEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getMerchantId(): int;

    public function setMerchantId(int $merchantId): void;

    public function getMerchantBranchId(): int;

    public function setMerchantBranchId(int $merchantBranchId): void;

    public function getEmail(): EmailValueObject;

    public function setEmail(EmailValueObject $email): void;

    public function getPassword(): HashedPasswordValueObject;

    public function setPassword(PasswordValueObject $password): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;

    public function getImage(): ImageValueObject;

    public function setImage(ImageValueObject $image): void;
}
