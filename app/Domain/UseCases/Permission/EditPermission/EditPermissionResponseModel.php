<?php

namespace App\Domain\UseCases\Permission\EditPermission;

use App\Domain\Interfaces\Entities\IPermissionEntity;

class EditPermissionResponseModel
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
