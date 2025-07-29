<?php

namespace App\Domain\UseCases\Subcategory\StoreSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IStoreSubcategoryOutputPort
{
    public function subcategoryCreated(StoreSubcategoryResponseModel $model): IViewModel;

    public function unableToStoreSubcategory(StoreSubcategoryResponseModel $model, \Throwable $e): IViewModel;
}
