<?php

namespace App\Domain\UseCases\Permission\ListPermission;

class ListPermissionRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
