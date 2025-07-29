<?php

namespace App\Domain\UseCases\Admin\PaginateAdmin;

class PaginateAdminRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
