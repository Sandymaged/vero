<?php

namespace App\Domain\UseCases\City\CreateCity;

use App\Domain\Interfaces\IViewModel;

interface ICreateCityInputPort
{
    public function createCity(CreateCityRequestModel $model): IViewModel;
}
