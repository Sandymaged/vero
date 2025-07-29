<?php

namespace App\ValueObjects;

final class BooleanValueObject
{
    public $value;

    public function __construct(string $boolean)
    {
        $boolean = $boolean ?: 0;

        if (!in_array($boolean, [0, 1])) {
            throw new \DomainException("Invalid value.");
        }

        $this->value = $boolean;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $boolean): bool
    {
        return $this->value == $boolean->value;
    }

    public function getNumber(): bool
    {
        switch ($this->value) {
            case 1:
                $this->value = 1;
                break;
            case 0:
                $this->value = 0;
                break;
            default:
                throw new \InvalidArgumentException("Invalid value '{$this->value}'");
        }

        return $this->value;
    }
}
