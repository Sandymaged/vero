<?php

namespace App\Domain\UseCases\State\DeleteState;

use App\Domain\Interfaces\IViewModel;

interface IDeleteStateOutputPort
{
    public function stateDeleted(DeleteStateResponseModel $model): IViewModel;

    public function unableToDeleteState(\Throwable $e): IViewModel;

    public function unableToFindState(): IViewModel;
}
