<?php

namespace App\Domain\UseCases\State\DeleteState;

use App\Domain\Interfaces\Entities\IStateEntity;

class DeleteStateResponseModel
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
