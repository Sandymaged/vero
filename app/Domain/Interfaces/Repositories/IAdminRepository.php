<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\IAdminEntity;

interface IAdminRepository
{
    public function exists(IAdminEntity $admin): bool;
}
