<?php

namespace App\Domain\Entities;


use App\ValueObjects\BooleanValueObject;
use App\ValueObjects\EmailValueObject;
use App\ValueObjects\HashedPasswordValueObject;
use App\ValueObjects\ImageValueObject;
use App\ValueObjects\PasswordValueObject;

trait UserEntityTrait
{
    // IUserEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): EmailValueObject
    {
        return new EmailValueObject($this->attributes['email']);
    }

    public function setEmail(EmailValueObject $email): void
    {
        $this->attributes['email'] = (string)$email;
    }

    public function getPassword(): HashedPasswordValueObject
    {
        return new HashedPasswordValueObject($this->attributes['password']);
    }

    public function setPassword(PasswordValueObject $password): void
    {
        $this->attributes['password'] = (string)$password->hashed();
    }

    public function getIsActive(): BooleanValueObject
    {
        return new BooleanValueObject($this->attributes['is_active']);
    }

    public function setIsActive(BooleanValueObject $boolean): void
    {
        $this->attributes['is_active'] = $boolean->getNumber();
    }

    public function getImage(): ImageValueObject
    {
        return new ImageValueObject($this->attributes['image'], self::IMAGE_DIR);
    }

    public function setImage(ImageValueObject $image): void
    {
        $this->attributes['image'] = $image;
    }
}
