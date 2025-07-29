<?php

namespace App\Domain\UseCases\Category\ListCategory;

use Illuminate\Database\Eloquent\Collection;

class ListCategoryResponseModel
{
    private $categories;

    public function __construct(
        Collection $categories
    )
    {
        $this->categories = $categories;
    }

    public function getCategorys(): Collection
    {
        return $this->categories;
    }
}
