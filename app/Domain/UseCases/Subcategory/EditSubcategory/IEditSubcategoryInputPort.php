<?php

namespace App\Domain\UseCases\Subcategory\EditSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IEditSubcategoryInputPort
{
    public function editSubcategory(int $id, EditSubcategoryRequestModel $model): IViewModel;
}
