<?php

namespace App\Domain\UseCases\Offer\StoreOffer;

use App\Domain\Interfaces\Entities\IOfferEntity;

class StoreOfferResponseModel
{
    private $offer;
    public function __construct(
        IOfferEntity $offer
    )
    {
        $this->offer = $offer;
    }

    public function getOffer(): IOfferEntity
    {
        return $this->offer;
    }
}
