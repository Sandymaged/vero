<?php

namespace App\Domain\UseCases\State\DeleteAllState;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllStateOutputPort
{
    public function statesDeleted(): IViewModel;

    public function unableToDeleteAllState(\Throwable $e): IViewModel;
}
