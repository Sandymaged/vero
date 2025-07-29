<?php

namespace App\ValueObjects;

final class PasswordValueObject
{
    public const VALIDATION_REGEX = "/\w{6,}/";

    public $value;

    public function __construct(string $password)
    {
        if ($password && !filter_var($password, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => self::VALIDATION_REGEX]])) {
            throw new \DomainException("Invalid password.");
        }

        $this->value = $password;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function hashed(): HashedPasswordValueObject
    {
        return HashedPasswordValueObject::hash($this);
    }
}
