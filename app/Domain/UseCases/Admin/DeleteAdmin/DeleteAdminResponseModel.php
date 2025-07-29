<?php

namespace App\Domain\UseCases\Admin\DeleteAdmin;

use App\Domain\Interfaces\Entities\IAdminEntity;

class DeleteAdminResponseModel
{
    private $admin;
    public function __construct(
        IAdminEntity $admin
    )
    {
        $this->admin = $admin;
    }

    public function getAdmin(): IAdminEntity
    {
        return $this->admin;
    }
}
