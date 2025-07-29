<?php

namespace App\Domain\UseCases\City\DeleteCity;

use App\Domain\Interfaces\Entities\ICityEntity;

class DeleteCityResponseModel
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
