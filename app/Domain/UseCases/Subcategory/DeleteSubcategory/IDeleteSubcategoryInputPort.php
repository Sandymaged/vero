<?php

namespace App\Domain\UseCases\Subcategory\DeleteSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteSubcategoryInputPort
{
    public function deleteSubcategory(int $id, DeleteSubcategoryRequestModel $model): IViewModel;
}
