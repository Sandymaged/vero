<?php

namespace App\Domain\UseCases\Permission\StorePermission;

use App\Domain\Interfaces\Entities\IPermissionEntity;

class StorePermissionResponseModel
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
