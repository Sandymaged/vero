<?php

namespace App\Domain\UseCases\Permission\ListPermission;

use Illuminate\Database\Eloquent\Collection;

class ListPermissionResponseModel
{
    private $permissions;

    public function __construct(
        Collection $permissions
    )
    {
        $this->permissions = $permissions;
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;
    }
}
