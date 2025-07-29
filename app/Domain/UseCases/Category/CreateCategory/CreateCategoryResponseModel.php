<?php

namespace App\Domain\UseCases\Category\CreateCategory;

class CreateCategoryResponseModel
{
    private $states;

    public function __construct(
        array $states
    )
    {
        $this->states = $states;
    }

    public function getStates(): array
    {
        return $this->states;
    }
}
