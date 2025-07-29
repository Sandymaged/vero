<?php

namespace App\ValueObjects;

final class UrlValueObject
{
    public $value;

    public function __construct(string $url)
    {
        if ($url && !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \DomainException("Invalid url '{$url}'.");
        }

        $this->value = $url;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $url): bool
    {
        return $this->value == $url->value;
    }
}
