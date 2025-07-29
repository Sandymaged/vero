<?php

namespace App\Domain\UseCases\MerchantBranch\CreateMerchantBranch;

class CreateMerchantBranchResponseModel
{
    private $merchants;
    private $states;

    public function __construct(
        array $merchants,
        array $states
    )
    {
        $this->merchants = $merchants;
        $this->states = $states;
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
