<?php

namespace App\Domain\UseCases\City\UpdateCity;

use App\Domain\Interfaces\IViewModel;

interface IUpdateCityOutputPort
{
    public function cityUpdated(UpdateCityResponseModel $model): IViewModel;

    public function unableToUpdateCity(UpdateCityResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindCity(): IViewModel;
}
