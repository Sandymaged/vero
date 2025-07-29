<?php

namespace App\Domain\UseCases\Subcategory\DeleteSubcategory;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;

class DeleteSubcategoryResponseModel
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
