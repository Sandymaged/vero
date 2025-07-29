<?php

namespace App\Domain\UseCases\Admin\EditAdmin;

use App\Domain\Interfaces\Entities\IAdminEntity;

class EditAdminResponseModel
{

    private $roles;
    private $admin;

    public function __construct(
        IAdminEntity $admin,
        array $roles
    )
    {

        $this->admin = $admin;
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getAdmin(): IAdminEntity
    {
        return $this->admin;
    }
}
