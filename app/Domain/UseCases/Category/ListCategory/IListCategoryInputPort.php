<?php

namespace App\Domain\UseCases\Category\ListCategory;

use App\Domain\Interfaces\IViewModel;

interface IListCategoryInputPort
{
    public function listCategory(ListCategoryRequestModel $model): IViewModel;
}
