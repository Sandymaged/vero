<?php

namespace App\Domain\UseCases\City\StoreCity;

use App\Domain\Interfaces\IViewModel;

interface IStoreCityOutputPort
{
    public function cityCreated(StoreCityResponseModel $model): IViewModel;

    public function unableToStoreCity(StoreCityResponseModel $model, \Throwable $e): IViewModel;
}
