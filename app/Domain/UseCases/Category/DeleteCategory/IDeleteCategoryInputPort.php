<?php

namespace App\Domain\UseCases\Category\DeleteCategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteCategoryInputPort
{
    public function deleteCategory(int $id, DeleteCategoryRequestModel $model): IViewModel;
}
