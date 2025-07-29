<?php

namespace App\Domain\UseCases\Service\StoreService;

use App\Domain\Interfaces\Entities\IServiceEntity;

class StoreServiceResponseModel
{
    private $service;
    public function __construct(
        IServiceEntity $service
    )
    {
        $this->service = $service;
    }

    public function getService(): IServiceEntity
    {
        return $this->service;
    }
}
