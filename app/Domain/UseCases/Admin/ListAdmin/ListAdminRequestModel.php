<?php

namespace App\Domain\UseCases\Admin\ListAdmin;

class ListAdminRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
