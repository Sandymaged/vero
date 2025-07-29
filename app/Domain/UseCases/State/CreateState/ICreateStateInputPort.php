<?php

namespace App\Domain\UseCases\State\CreateState;

use App\Domain\Interfaces\IViewModel;

interface ICreateStateInputPort
{
    public function createState(CreateStateRequestModel $model): IViewModel;
}
