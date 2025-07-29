<?php

namespace App\Domain\UseCases\City\EditCity;

use App\Domain\Interfaces\IViewModel;

interface IEditCityOutputPort
{
    public function editCity(EditCityResponseModel $model): IViewModel;

    public function unableToFindCity(): IViewModel;
}
