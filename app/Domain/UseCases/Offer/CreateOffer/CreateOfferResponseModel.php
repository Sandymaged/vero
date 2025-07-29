<?php

namespace App\Domain\UseCases\Offer\CreateOffer;

class CreateOfferResponseModel
{
    private $merchants;
    private $merchantBranches;
    private $categories;

    public function __construct(
        array $merchants,
        array $merchantBranches,
        array $categories
    )
    {
        $this->merchants = $merchants;
        $this->merchantBranches = $merchantBranches;
        $this->categories = $categories;
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
