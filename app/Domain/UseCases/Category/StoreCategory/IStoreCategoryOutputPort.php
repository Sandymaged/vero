<?php

namespace App\Domain\UseCases\Category\StoreCategory;

use App\Domain\Interfaces\IViewModel;

interface IStoreCategoryOutputPort
{
    public function categoryCreated(StoreCategoryResponseModel $model): IViewModel;

    public function unableToStoreCategory(StoreCategoryResponseModel $model, \Throwable $e): IViewModel;
}
