<?php

namespace App\Domain\UseCases\Subcategory\DeleteSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteSubcategoryOutputPort
{
    public function subcategoryDeleted(DeleteSubcategoryResponseModel $model): IViewModel;

    public function unableToDeleteSubcategory(\Throwable $e): IViewModel;

    public function unableToFindSubcategory(): IViewModel;
}
