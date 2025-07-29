<?php

namespace App\Domain\UseCases\Service\EditService;

use App\Domain\Interfaces\Entities\IServiceEntity;

class EditServiceResponseModel
{
    private $states;
    private $subcategories;
    private $service;

    public function __construct(
        IServiceEntity $service,
        array           $states,
        array           $subcategories
    )
    {
        $this->service = $service;
        $this->states = $states;
        $this->subcategories = $subcategories;
    }

    public function getService(): IServiceEntity
    {
        return $this->service;
    }

    public function getStates(): array
    {
        return $this->states;
    }

    public function getSubcategories(): array
    {
        return $this->subcategories;
    }
}
