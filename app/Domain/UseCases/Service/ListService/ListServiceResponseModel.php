<?php

namespace App\Domain\UseCases\Service\ListService;

use Illuminate\Database\Eloquent\Collection;

class ListServiceResponseModel
{
    private $services;

    public function __construct(
        Collection $services
    )
    {
        $this->services = $services;
    }

    public function getServices(): Collection
    {
        return $this->services;
    }
}
