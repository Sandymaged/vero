<?php

namespace App\Domain\UseCases\City\DeleteAllCity;

class DeleteAllCityRequestModel
{
    private $attributes;
    /**
     * @param array<mixed> $attributes
     */
    public function __construct(
        array $attributes
    )
    {
        $this->attributes = $attributes;
    }

    public function getIds(): array
    {
        return $this->attributes['ids'] ?? [];
    }
}
