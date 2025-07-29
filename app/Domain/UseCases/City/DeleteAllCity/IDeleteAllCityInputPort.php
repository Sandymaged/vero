<?php

namespace App\Domain\UseCases\City\DeleteAllCity;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllCityInputPort
{
    public function deleteAllCity(DeleteAllCityRequestModel $model): IViewModel;
}
