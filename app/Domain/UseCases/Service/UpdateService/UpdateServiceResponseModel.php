<?php

namespace App\Domain\UseCases\Service\UpdateService;

use App\Domain\Interfaces\Entities\IServiceEntity;

class UpdateServiceResponseModel
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
