<?php

namespace App\Domain\UseCases\Permission\UpdatePermission;

class UpdatePermissionRequestModel
{

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

    public function getGuardName(): string
    {
        return $this->attributes['guard_name'] ?? '';
    }
}
