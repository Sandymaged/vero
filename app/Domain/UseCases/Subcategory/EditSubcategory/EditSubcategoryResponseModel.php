<?php

namespace App\Domain\UseCases\Subcategory\EditSubcategory;

use App\Domain\Interfaces\Entities\ISubcategoryEntity;

class EditSubcategoryResponseModel
{
    private $states;
    private $categories;
    private $subcategory;

    public function __construct(
        ISubcategoryEntity $subcategory,
        array              $states,
        array              $categories
    )
    {
        $this->subcategory = $subcategory;
        $this->states = $states;
        $this->categories = $categories;
    }

    public function getSubcategory(): ISubcategoryEntity
    {
        return $this->subcategory;
    }

    public function getStates(): array
    {
        return $this->states;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }
}
