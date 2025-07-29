<?php

namespace App\Domain\UseCases\Subcategory\CreateSubcategory;

use App\Domain\Interfaces\IViewModel;

interface ICreateSubcategoryInputPort
{
    public function createSubcategory(CreateSubcategoryRequestModel $model): IViewModel;
}
