<?php

namespace App\Domain\UseCases\City\StoreCity;

use App\Domain\Interfaces\IViewModel;

interface IStoreCityInputPort
{
    public function createCity(StoreCityRequestModel $model): IViewModel;
}
