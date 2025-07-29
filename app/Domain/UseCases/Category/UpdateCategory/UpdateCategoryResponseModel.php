<?php

namespace App\Domain\UseCases\Category\UpdateCategory;

use App\Domain\Interfaces\Entities\ICategoryEntity;

class UpdateCategoryResponseModel
{
    private $category;
    public function __construct(
        ICategoryEntity $category
    )
    {
        $this->category = $category;
    }

    public function getCategory(): ICategoryEntity
    {
        return $this->category;
    }
}
