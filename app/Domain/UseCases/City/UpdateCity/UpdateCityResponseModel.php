<?php

namespace App\Domain\UseCases\City\UpdateCity;

use App\Domain\Interfaces\Entities\ICityEntity;

class UpdateCityResponseModel
{
    private $city;
    public function __construct(
        ICityEntity $city
    )
    {
        $this->city = $city;
    }

    public function getCity(): ICityEntity
    {
        return $this->city;
    }
}
