<?php

namespace App\Domain\UseCases\City\DeleteCity;

use App\Domain\Interfaces\IViewModel;

interface IDeleteCityOutputPort
{
    public function cityDeleted(DeleteCityResponseModel $model): IViewModel;

    public function unableToDeleteCity(\Throwable $e): IViewModel;

    public function unableToFindCity(): IViewModel;
}
