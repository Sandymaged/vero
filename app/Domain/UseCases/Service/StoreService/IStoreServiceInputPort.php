<?php

namespace App\Domain\UseCases\Service\StoreService;

use App\Domain\Interfaces\IViewModel;

interface IStoreServiceInputPort
{
    public function createService(StoreServiceRequestModel $model): IViewModel;
}
