<?php

namespace App\Domain\UseCases\Subcategory\StoreSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IStoreSubcategoryInputPort
{
    public function createSubcategory(StoreSubcategoryRequestModel $model): IViewModel;
}
