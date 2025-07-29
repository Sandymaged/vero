<?php

namespace App\Domain\UseCases\Service\ListService;

class ListServiceRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
