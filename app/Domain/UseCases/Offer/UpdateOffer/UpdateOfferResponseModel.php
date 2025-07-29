<?php

namespace App\Domain\UseCases\Offer\UpdateOffer;

use App\Domain\Interfaces\Entities\IOfferEntity;

class UpdateOfferResponseModel
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
