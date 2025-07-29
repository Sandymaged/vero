<?php

namespace App\Domain\UseCases\City\ListCity;

use App\Domain\Interfaces\IViewModel;

interface IListCityOutputPort
{
    public function cityListed(ListCityResponseModel $model): IViewModel;
}
