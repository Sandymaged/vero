<?php

namespace App\Domain\UseCases\City\ListCity;

use Illuminate\Database\Eloquent\Collection;

class ListCityResponseModel
{
    private $cities;

    public function __construct(
        Collection $cities
    )
    {
        $this->cities = $cities;
    }

    public function getCities(): Collection
    {
        return $this->cities;
    }
}
