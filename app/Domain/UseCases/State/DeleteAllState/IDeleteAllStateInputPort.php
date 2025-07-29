<?php

namespace App\Domain\UseCases\State\DeleteAllState;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllStateInputPort
{
    public function deleteAllState(DeleteAllStateRequestModel $model): IViewModel;
}
