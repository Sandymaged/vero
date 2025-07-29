<?php

namespace App\Domain\UseCases\Category\ListCategory;

class ListCategoryRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
