<?php

namespace App\Domain\Interfaces\Entities;

use App\ValueObjects\EmailValueObject;
use App\ValueObjects\HashedPasswordValueObject;
use App\ValueObjects\PasswordValueObject;

interface IUserEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): EmailValueObject;

    public function setEmail(EmailValueObject $email): void;

    public function getPassword(): HashedPasswordValueObject;

    public function setPassword(PasswordValueObject $password): void;
}
