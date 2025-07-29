<?php

namespace App\Domain\UseCases\City\EditCity;

use App\Domain\Interfaces\Entities\ICityEntity;

class EditCityResponseModel
{
    private $states;
    private $city;

    public function __construct(
        ICityEntity $city,
        array $states
    )
    {
        $this->city = $city;
        $this->states = $states;
    }

    public function getStates(): array
    {
        return $this->states;
    }

    public function getCity(): ICityEntity
    {
        return $this->city;
    }
}
