<?php

namespace App\Domain\UseCases\State\UpdateState;

use App\Domain\Interfaces\Entities\IStateEntity;

class UpdateStateResponseModel
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
