<?php

namespace App\Domain\UseCases\City\UpdateCity;

use App\Domain\Interfaces\IViewModel;

interface IUpdateCityInputPort
{
    public function updateCity(int $id, UpdateCityRequestModel $model): IViewModel;
}
