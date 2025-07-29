<?php

namespace App\Domain\UseCases\City\ListCity;

class ListCityRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
