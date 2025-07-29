<?php

namespace App\Domain\UseCases\Offer\EditOffer;

use App\Domain\Interfaces\Entities\IOfferEntity;

class EditOfferResponseModel
{
    private $merchants;
    private $merchantBranches;
    private $categories;
    private $offer;

    public function __construct(
        IOfferEntity $offer,
        array $merchants,
        array $merchantBranches,
        array $categories
    )
    {
        $this->offer = $offer;
        $this->merchants = $merchants;
        $this->merchantBranches = $merchantBranches;
        $this->categories = $categories;
    }

    public function getOffer(): IOfferEntity
    {
        return $this->offer;
    }

    public function getMerchantBranches(): array
    {
        return $this->merchantBranches;
    }

    public function getMerchants(): array
    {
        return $this->merchants;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }
}
