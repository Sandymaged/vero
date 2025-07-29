<?php

namespace App\Domain\UseCases\Subcategory\CreateSubcategory;

use App\Domain\Interfaces\IViewModel;

interface ICreateSubcategoryOutputPort
{
    public function createSubcategory(CreateSubcategoryResponseModel $model): IViewModel;
}
