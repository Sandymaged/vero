<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\Hash;

final class HashedPasswordValueObject
{
    public $value;

    public function __construct(string $password)
    {
        $info = Hash::info($password);

        if (!isset($info['algo']) || $info['algoName'] == 'unknown') {
            throw new \DomainException("Not an hashed password.");
        }

        $this->value = $password;
    }

    public static function hash(PasswordValueObject $password): self
    {
        return new self(
            Hash::make((string)$password)
        );
    }

    public function __toString()
    {
        return $this->value;
    }

    public function check(PasswordValueObject $password): bool
    {
        return Hash::check((string)$password, $this->value);
    }
}
