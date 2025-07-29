<?php

namespace App\Domain\UseCases\State\DeleteState;

use App\Domain\Interfaces\IViewModel;

interface IDeleteStateInputPort
{
    public function deleteState(int $id, DeleteStateRequestModel $model): IViewModel;
}
