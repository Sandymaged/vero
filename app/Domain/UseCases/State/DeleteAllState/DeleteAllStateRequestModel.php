<?php

namespace App\Domain\UseCases\State\DeleteAllState;

class DeleteAllStateRequestModel
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
