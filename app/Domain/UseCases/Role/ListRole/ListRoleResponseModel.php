<?php

namespace App\Domain\UseCases\Role\ListRole;

use Illuminate\Database\Eloquent\Collection;

class ListRoleResponseModel
{
    private $roles;

    public function __construct(
        Collection $roles
    )
    {
        $this->roles = $roles;
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }
}
