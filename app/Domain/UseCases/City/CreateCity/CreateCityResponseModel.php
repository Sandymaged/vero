<?php

namespace App\Domain\UseCases\City\CreateCity;

class CreateCityResponseModel
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
