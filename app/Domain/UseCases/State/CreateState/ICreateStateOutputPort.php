<?php

namespace App\Domain\UseCases\State\CreateState;

use App\Domain\Interfaces\IViewModel;

interface ICreateStateOutputPort
{
    public function createState(CreateStateResponseModel $model): IViewModel;
}
