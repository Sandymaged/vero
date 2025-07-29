<?php

namespace App\Domain\UseCases\Merchant\EditMerchant;

use App\Domain\Interfaces\Entities\IMerchantEntity;

class EditMerchantResponseModel
{
    private $states;
    private $merchant;

    public function __construct(
        IMerchantEntity $merchant,
        array $states
    )
    {
        $this->states = $states;
        $this->merchant = $merchant;
    }

    public function getStates(): array
    {
        return $this->states;
    }

    public function getMerchant(): IMerchantEntity
    {
        return $this->merchant;
    }
}
