<?php

namespace App\Domain\UseCases\Subcategory\DeleteAllSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllSubcategoryOutputPort
{
    public function subcategoriesDeleted(): IViewModel;

    public function unableToDeleteAllSubcategory(\Throwable $e): IViewModel;
}
