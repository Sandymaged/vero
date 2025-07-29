<?php

namespace App\Domain\UseCases\Merchant\ListMerchant;

class ListMerchantResponseModel
{
    private $states;

    public function __construct(
        array $states
    )
    {
        $this->states = $states;
    }

    public function getStates(): array
    {
        return $this->states;
    }
}
