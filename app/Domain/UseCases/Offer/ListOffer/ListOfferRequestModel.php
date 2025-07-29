<?php

namespace App\Domain\UseCases\Offer\ListOffer;

class ListOfferRequestModel
{
    public $page = 1;

    public function __construct(?int $page = 1)
    {
        $this->page = $page;
    }

}
