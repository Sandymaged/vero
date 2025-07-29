<?php

namespace App\Domain\UseCases\Subcategory\UpdateSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IUpdateSubcategoryInputPort
{
    public function updateSubcategory(int $id, UpdateSubcategoryRequestModel $model): IViewModel;
}
