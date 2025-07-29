<?php

namespace App\Domain\UseCases\State\StoreState;

use App\Domain\Interfaces\Entities\IStateEntity;

class StoreStateResponseModel
{
    private $role;
    public function __construct(
        IStateEntity $role
    )
    {
        $this->role = $role;
    }

    public function getState(): IStateEntity
    {
        return $this->role;
    }
}
