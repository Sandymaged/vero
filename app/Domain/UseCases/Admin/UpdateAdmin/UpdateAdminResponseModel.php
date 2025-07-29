<?php

namespace App\Domain\UseCases\Admin\UpdateAdmin;

use App\Domain\Interfaces\Entities\IAdminEntity;

class UpdateAdminResponseModel
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
