<?php

namespace App\Domain\UseCases\Category\EditCategory;

use App\Domain\Interfaces\Entities\ICategoryEntity;

class EditCategoryResponseModel
{
    private $states;
    private $category;

    public function __construct(
        ICategoryEntity $category,
        array           $states
    )
    {
        $this->category = $category;
        $this->states = $states;
    }

    public function getCategory(): ICategoryEntity
    {
        return $this->category;
    }

    public function getStates(): array
    {
        return $this->states;
    }

}
