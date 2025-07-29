<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\IMerchantUserEntity;

interface IMerchantUserRepository
{
    public function exists(IMerchantUserEntity $merchantUser): bool;
}
