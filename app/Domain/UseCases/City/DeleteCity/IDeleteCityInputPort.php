<?php

namespace App\Domain\UseCases\City\DeleteCity;

use App\Domain\Interfaces\IViewModel;

interface IDeleteCityInputPort
{
    public function deleteCity(int $id, DeleteCityRequestModel $model): IViewModel;
}
