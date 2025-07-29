<?php

namespace App\Domain\UseCases\Subcategory\UpdateSubcategory;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;

class UpdateSubcategoryResponseModel
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
