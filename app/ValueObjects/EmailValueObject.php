<?php

namespace App\ValueObjects;

final class EmailValueObject
{
    public $value;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \DomainException("Invalid email '{$email}'.");
        }

        $this->value = $email;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $email): bool
    {
        return $this->value == $email->value;
    }
}
