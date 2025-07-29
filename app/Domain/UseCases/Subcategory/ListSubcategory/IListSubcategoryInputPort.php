<?php

namespace App\Domain\UseCases\Subcategory\ListSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IListSubcategoryInputPort
{
    public function listSubcategory(ListSubcategoryRequestModel $model): IViewModel;
}
