<?php

namespace App\Domain\UseCases\State\UpdateState;

use App\Domain\Interfaces\IViewModel;

interface IUpdateStateOutputPort
{
    public function stateUpdated(UpdateStateResponseModel $model): IViewModel;

    public function unableToUpdateState(UpdateStateResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindState(): IViewModel;
}
