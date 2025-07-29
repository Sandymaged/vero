<?php

namespace App\Domain\UseCases\Permission\DeletePermission;

use App\Domain\Interfaces\Entities\IPermissionEntity;

class DeletePermissionResponseModel
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
