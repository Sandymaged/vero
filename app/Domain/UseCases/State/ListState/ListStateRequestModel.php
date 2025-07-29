<?php

namespace App\Domain\UseCases\State\ListState;

class ListStateRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
