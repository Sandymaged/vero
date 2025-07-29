<?php

namespace App\Domain\UseCases\Service\StoreService;

use App\Domain\Interfaces\IViewModel;

interface IStoreServiceOutputPort
{
    public function serviceCreated(StoreServiceResponseModel $model): IViewModel;

    public function unableToStoreService(StoreServiceResponseModel $model, \Throwable $e): IViewModel;
}
