<?php

namespace App\Domain\UseCases\Offer\ListOffer;

use Illuminate\Database\Eloquent\Collection;

class ListOfferResponseModel
{
    private $offers;

    public function __construct(
        Collection $offers
    )
    {
        $this->offers = $offers;
    }

    public function getOffers(): Collection
    {
        return $this->offers;
    }
}
