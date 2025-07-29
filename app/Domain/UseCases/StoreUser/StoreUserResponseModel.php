<?php

namespace App\Domain\UseCases\StoreUser;

use App\Domain\Interfaces\Entities\IUserEntity;

class StoreUserResponseModel
{
    private $user;
    public function __construct(
        IUserEntity $user
    )
    {
        $this->user = $user;
    }

    public function getUser(): IUserEntity
    {
        return $this->user;
    }
}
