<?php

namespace App\Domain\UseCases\State\ListState;

use Illuminate\Database\Eloquent\Collection;

class ListStateResponseModel
{
    private $states;

    public function __construct(
        Collection $states
    )
    {
        $this->states = $states;
    }

    public function getStates(): Collection
    {
        return $this->states;
    }
}
