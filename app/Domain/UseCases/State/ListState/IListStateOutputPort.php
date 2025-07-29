<?php

namespace App\Domain\UseCases\State\ListState;

use App\Domain\Interfaces\IViewModel;

interface IListStateOutputPort
{
    public function stateListed(ListStateResponseModel $model): IViewModel;
}
