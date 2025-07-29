<?php

namespace App\ValueObjects;

final class OfferTypeValueObject
{
    public $value;

    public function __construct(string $type)
    {
        if (!in_array($type, [1, 2])) {
            throw new \DomainException("Invalid type.");
        }

        $this->value = $type;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $type): bool
    {
        return $this->value == $type->value;
    }

    public function getText(): int
    {
        switch ($this->value) {
            case 1:
                $this->value = 'man';
                break;
            case 2:
                $this->value = 'female';
                break;
            default:
//                throw new \InvalidArgumentException("Invalid type '{$this->value}'");
                break;
        }

        return $this->value;

    }

    public function getNumber(): string
    {
        switch ($this->value) {
            case "man":
                $this->value = 1;
                break;
            case "female":
                $this->value = 2;
                break;
            default:
//                throw new \InvalidArgumentException("Invalid type '{$this->value}'");
                break;
        }

        return $this->value;
    }
}
