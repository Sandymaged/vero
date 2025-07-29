<?php

namespace App\Domain\UseCases\Category\DeleteCategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteCategoryOutputPort
{
    public function categoryDeleted(DeleteCategoryResponseModel $model): IViewModel;

    public function unableToDeleteCategory(\Throwable $e): IViewModel;

    public function unableToFindCategory(): IViewModel;
}
