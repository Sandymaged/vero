<?php

namespace App\Domain\UseCases\City\CreateCity;

use App\Domain\Interfaces\IViewModel;

interface ICreateCityOutputPort
{
    public function createCity(CreateCityResponseModel $model): IViewModel;
}
