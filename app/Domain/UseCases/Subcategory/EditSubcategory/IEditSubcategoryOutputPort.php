<?php

namespace App\Domain\UseCases\Subcategory\EditSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IEditSubcategoryOutputPort
{
    public function editSubcategory(EditSubcategoryResponseModel $model): IViewModel;

    public function unableToFindSubcategory(): IViewModel;
}
