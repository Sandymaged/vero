<?php

namespace App\Domain\UseCases\Category\CreateCategory;

use App\Domain\Interfaces\IViewModel;

interface ICreateCategoryInputPort
{
    public function createCategory(CreateCategoryRequestModel $model): IViewModel;
}
