<?php

namespace App\Domain\UseCases\Category\DeleteCategory;

use App\Domain\Interfaces\Entities\ICategoryEntity;

class DeleteCategoryResponseModel
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
