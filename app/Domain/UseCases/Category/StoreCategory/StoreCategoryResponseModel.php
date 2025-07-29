<?php

namespace App\Domain\UseCases\Category\StoreCategory;

use App\Domain\Interfaces\Entities\ICategoryEntity;

class StoreCategoryResponseModel
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
