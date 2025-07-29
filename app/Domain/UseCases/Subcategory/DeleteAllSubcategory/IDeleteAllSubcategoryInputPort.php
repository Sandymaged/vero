<?php

namespace App\Domain\UseCases\Subcategory\DeleteAllSubcategory;

use App\Domain\Interfaces\IViewModel;

interface IDeleteAllSubcategoryInputPort
{
    public function deleteAllSubcategory(DeleteAllSubcategoryRequestModel $model): IViewModel;
}
