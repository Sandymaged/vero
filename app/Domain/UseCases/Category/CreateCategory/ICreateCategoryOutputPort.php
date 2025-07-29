<?php

namespace App\Domain\UseCases\Category\CreateCategory;

use App\Domain\Interfaces\IViewModel;

interface ICreateCategoryOutputPort
{
    public function createCategory(CreateCategoryResponseModel $model): IViewModel;
}
