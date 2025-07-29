<?php

namespace App\Domain\UseCases\Role\UpdateRole;

use App\Domain\Interfaces\Entities\IRoleEntity;

class UpdateRoleResponseModel
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
