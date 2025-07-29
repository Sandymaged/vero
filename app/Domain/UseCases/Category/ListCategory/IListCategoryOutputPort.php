<?php

namespace App\Domain\UseCases\Category\ListCategory;

use App\Domain\Interfaces\IViewModel;

interface IListCategoryOutputPort
{
    public function categoryListed(ListCategoryResponseModel $model): IViewModel;
}
