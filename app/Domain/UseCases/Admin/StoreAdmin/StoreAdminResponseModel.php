<?php

namespace App\Domain\UseCases\Admin\StoreAdmin;

use App\Domain\Interfaces\Entities\IAdminEntity;

class StoreAdminResponseModel
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
