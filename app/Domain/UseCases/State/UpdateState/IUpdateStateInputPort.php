<?php

namespace App\Domain\UseCases\State\UpdateState;

use App\Domain\Interfaces\IViewModel;

interface IUpdateStateInputPort
{
    public function updateState(int $id, UpdateStateRequestModel $model): IViewModel;
}
