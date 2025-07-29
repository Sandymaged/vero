<?php

namespace App\Domain\UseCases\Subcategory\ListSubcategory;

class ListSubcategoryRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
