<?php

namespace App\Domain\UseCases\Category\EditCategory;

use App\Domain\Interfaces\IViewModel;

interface IEditCategoryInputPort
{
    public function editCategory(int $id, EditCategoryRequestModel $model): IViewModel;
}
