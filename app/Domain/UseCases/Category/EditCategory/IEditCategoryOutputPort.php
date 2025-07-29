<?php

namespace App\Domain\UseCases\Category\EditCategory;

use App\Domain\Interfaces\IViewModel;

interface IEditCategoryOutputPort
{
    public function editCategory(EditCategoryResponseModel $model): IViewModel;

    public function unableToFindCategory(): IViewModel;
}
