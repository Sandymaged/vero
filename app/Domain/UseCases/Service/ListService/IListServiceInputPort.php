<?php

namespace App\Domain\UseCases\Service\ListService;

use App\Domain\Interfaces\IViewModel;

interface IListServiceInputPort
{
    public function listService(ListServiceRequestModel $model): IViewModel;
}
