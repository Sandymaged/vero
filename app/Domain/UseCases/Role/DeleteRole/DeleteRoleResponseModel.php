<?php

namespace App\Domain\UseCases\Role\DeleteRole;

use App\Domain\Interfaces\Entities\IRoleEntity;

class DeleteRoleResponseModel
{
    private $role;
    public function __construct(
        IRoleEntity $role
    )
    {
        $this->role = $role;
    }

    public function getRole(): IRoleEntity
    {
        return $this->role;
    }

}
