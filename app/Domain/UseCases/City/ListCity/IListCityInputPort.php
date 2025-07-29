<?php

namespace App\Domain\UseCases\City\ListCity;

use App\Domain\Interfaces\IViewModel;

interface IListCityInputPort
{
    public function listCity(ListCityRequestModel $model): IViewModel;
}
