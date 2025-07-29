<?php

namespace App\Domain\UseCases\Category\UpdateCategory;

use App\Domain\Interfaces\IViewModel;

interface IUpdateCategoryOutputPort
{
    public function categoryUpdated(UpdateCategoryResponseModel $model): IViewModel;

    public function unableToUpdateCategory(UpdateCategoryResponseModel $model, \Throwable $e): IViewModel;

    public function unableToFindCategory(): IViewModel;
}
