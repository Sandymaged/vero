<?php

namespace App\Domain\UseCases\Offer\DeleteOffer;

use App\Domain\Interfaces\Entities\IOfferEntity;

class DeleteOfferResponseModel
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
