<?php

namespace App\Domain\UseCases\State\ListState;

use App\Domain\Interfaces\IViewModel;

interface IListStateInputPort
{
    public function listState(ListStateRequestModel $model): IViewModel;
}
