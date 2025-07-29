<?php

namespace App\Domain\UseCases\Admin\ListAdmin;

class ListAdminResponseModel
{
    private $roles;

    public function __construct(
        array $roles
    )
    {
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
