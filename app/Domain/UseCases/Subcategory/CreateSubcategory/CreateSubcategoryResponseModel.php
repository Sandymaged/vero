<?php

namespace App\Domain\UseCases\Subcategory\CreateSubcategory;

class CreateSubcategoryResponseModel
{
    private $states;
    private $categories;

    public function __construct(
        array $states,
        array $categories
    )
    {
        $this->states = $states;
        $this->categories = $categories;
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
