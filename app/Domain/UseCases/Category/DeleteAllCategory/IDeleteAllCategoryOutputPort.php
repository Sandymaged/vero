<?php

namespace App\Domain\UseCases\Category\DeleteAllCategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllCategoryOutputPort
{
    public function categoriesDeleted(): IViewModel;

    public function unableToDeleteAllCategory(\Throwable $e): IViewModel;
}
