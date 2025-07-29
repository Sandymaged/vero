<?php

namespace App\Domain\UseCases\Subcategory\ListSubcategory;

use Illuminate\Database\Eloquent\Collection;

class ListSubcategoryResponseModel
{
    private $subcategories;

    public function __construct(
        Collection $subcategories
    )
    {
        $this->subcategories = $subcategories;
    }

    public function getSubcategorys(): Collection
    {
        return $this->subcategories;
    }
}
