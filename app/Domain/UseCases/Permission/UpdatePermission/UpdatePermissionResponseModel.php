<?php

namespace App\Domain\UseCases\Permission\UpdatePermission;

use App\Domain\Interfaces\Entities\IPermissionEntity;

class UpdatePermissionResponseModel
{
    private $permission;
    public function __construct(
        IPermissionEntity $permission
    )
    {
        $this->permission = $permission;
    }

    public function getPermission(): IPermissionEntity
    {
        return $this->permission;
    }
}
