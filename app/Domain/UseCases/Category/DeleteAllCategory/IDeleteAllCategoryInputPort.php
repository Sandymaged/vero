<?php

namespace App\Domain\UseCases\Category\DeleteAllCategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllCategoryInputPort
{
    public function deleteAllCategory(DeleteAllCategoryRequestModel $model): IViewModel;
}
