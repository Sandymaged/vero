<?php

namespace App\Domain\UseCases\Service\DeleteService;

use App\Domain\Interfaces\Entities\IServiceEntity;

class DeleteServiceResponseModel
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
