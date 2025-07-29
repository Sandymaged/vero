<?php

namespace App\Domain\UseCases\State\StoreState;

use App\Domain\Interfaces\IViewModel;

interface IStoreStateInputPort
{
    public function createState(StoreStateRequestModel $model): IViewModel;
}
