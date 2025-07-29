<?php

namespace App\Domain\UseCases\City\StoreCity;

use App\Domain\Interfaces\Entities\ICityEntity;

class StoreCityResponseModel
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
