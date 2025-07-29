<?php

namespace App\Domain\UseCases\Category\UpdateCategory;

use App\Domain\Interfaces\IViewModel;

interface IUpdateCategoryInputPort
{
    public function updateCategory(int $id, UpdateCategoryRequestModel $model): IViewModel;
}
