<?php

namespace App\Domain\UseCases\State\StoreState;

use App\Domain\Interfaces\IViewModel;

interface IStoreStateOutputPort
{
    public function stateCreated(StoreStateResponseModel $model): IViewModel;

    public function unableToStoreState(StoreStateResponseModel $model, \Throwable $e): IViewModel;
}
