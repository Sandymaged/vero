<?php

namespace App\Domain\UseCases\Subcategory\ListSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IListSubcategoryOutputPort
{
    public function subcategoryListed(ListSubcategoryResponseModel $model): IViewModel;
}
