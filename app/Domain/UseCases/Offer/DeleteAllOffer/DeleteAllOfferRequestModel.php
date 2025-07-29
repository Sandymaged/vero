<?php

namespace App\Domain\UseCases\Offer\DeleteAllOffer;

class DeleteAllOfferRequestModel
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
