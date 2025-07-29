<?php

namespace App\Domain\UseCases\Admin\UpdateAdmin;

class UpdateAdminRequestModel
{
    private $attributes;
    /**
     * @param array<mixed> $attributes
     */
    public function __construct(
        array $attributes
    )
    {
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getEmail(): string
    {
        return $this->attributes['email'] ?? '';
    }

    public function getIsActive(): int
    {
        return $this->attributes['is_active'] ?? 0;
    }

    public function getImage(): string
    {
        return $this->attributes['image'] ?? '';
    }

    public function getImageRemove(): string
    {
        return $this->attributes['image_remove'] ?? '';
    }

    public function getPassword(): string
    {
        return $this->attributes['password'] ?? '';
    }

    public function getRoles(): array
    {
        return $this->attributes['roles'] ?? [];
    }
}
