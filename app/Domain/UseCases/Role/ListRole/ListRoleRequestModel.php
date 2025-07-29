<?php

namespace App\Domain\UseCases\Role\ListRole;

class ListRoleRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
