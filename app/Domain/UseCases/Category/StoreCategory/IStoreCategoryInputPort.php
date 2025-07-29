<?php

namespace App\Domain\UseCases\Category\StoreCategory;

use App\Domain\Interfaces\IViewModel;

interface IStoreCategoryInputPort
{
    public function createCategory(StoreCategoryRequestModel $model): IViewModel;
}
