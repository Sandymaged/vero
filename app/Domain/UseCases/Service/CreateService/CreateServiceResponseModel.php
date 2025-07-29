<?php

namespace App\Domain\UseCases\Service\CreateService;

class CreateServiceResponseModel
{
    private $states;
    private $subcategories;

    public function __construct(
        array $states,
        array $subcategories
    )
    {
        $this->states = $states;
        $this->subcategories = $subcategories;
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
