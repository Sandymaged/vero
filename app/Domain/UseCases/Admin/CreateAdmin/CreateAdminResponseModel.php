<?php

namespace App\Domain\UseCases\Admin\CreateAdmin;

class CreateAdminResponseModel
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
