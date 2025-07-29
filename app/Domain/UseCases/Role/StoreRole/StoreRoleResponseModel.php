<?php

namespace App\Domain\UseCases\Role\StoreRole;

use App\Domain\Interfaces\Entities\IRoleEntity;

class StoreRoleResponseModel
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
