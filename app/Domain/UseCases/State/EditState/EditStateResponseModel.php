<?php

namespace App\Domain\UseCases\State\EditState;

use App\Domain\Interfaces\Entities\IStateEntity;

class EditStateResponseModel
{

    private $state;

    public function __construct(
        IStateEntity $state
    )
    {
        $this->state = $state;
    }

    public function getState(): IStateEntity
    {
        return $this->state;
    }

}
