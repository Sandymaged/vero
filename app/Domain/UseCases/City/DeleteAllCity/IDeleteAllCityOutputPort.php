<?php

namespace App\Domain\UseCases\City\DeleteAllCity;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllCityOutputPort
{
    public function citiesDeleted(): IViewModel;

    public function unableToDeleteAllCity(\Throwable $e): IViewModel;
}
