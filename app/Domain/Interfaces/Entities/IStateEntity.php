<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\EmailValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\LocationValueObject;
use App\ValueObjects\MerchantTypeValueObject;
use App\ValueObjects\UrlValueObject;

interface IStateEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getIsActive(): BooleanValueObject;

    public function setIsActive(BooleanValueObject $boolean): void;
}
