<?php

namespace App\Domain\UseCases\Subcategory\StoreSubcategory;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;

class StoreSubcategoryResponseModel
{
    private $subcategory;
    public function __construct(
        ISubcategoryEntity $subcategory
    )
    {
        $this->subcategory = $subcategory;
    }

    public function getSubcategory(): ISubcategoryEntity
    {
        return $this->subcategory;
    }
}
