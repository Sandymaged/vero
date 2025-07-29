<?php

namespace App\Domain\UseCases\MerchantBranch\EditMerchantBranch;

use App\Domain\Interfaces\Entities\IMerchantBranchEntity;

class EditMerchantBranchResponseModel
{
    private $merchants;
    private $states;
    private $merchantBranch;

    public function __construct(
        IMerchantBranchEntity $merchantBranch,
        array $merchants,
        array $states
    )
    {
        $this->merchantBranch = $merchantBranch;
        $this->merchants = $merchants;
        $this->states = $states;
    }

    public function getMerchantBranch(): IMerchantBranchEntity
    {
        return $this->merchantBranch;
    }

    public function getMerchants(): array
    {
        return $this->merchants;
    }

    public function getStates(): array
    {
        return $this->states;
    }
}
