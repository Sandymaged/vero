<?php

namespace App\Domain\UseCases\City\EditCity;

use App\Domain\Interfaces\IViewModel;

interface IEditCityInputPort
{
    public function editCity(int $id, EditCityRequestModel $model): IViewModel;
}
