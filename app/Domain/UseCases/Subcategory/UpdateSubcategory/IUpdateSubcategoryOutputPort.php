<?php

namespace App\Domain\UseCases\Subcategory\UpdateSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IUpdateSubcategoryOutputPort
{
    public function subcategoryUpdated(UpdateSubcategoryResponseModel $model): IViewModel;

    public function unableToUpdateSubcategory(UpdateSubcategoryResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindSubcategory(): IViewModel;
}
