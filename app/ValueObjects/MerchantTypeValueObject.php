<?php

namespace App\ValueObjects;

final class MerchantTypeValueObject
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
                $this->value = 'center';
                break;
            case 2:
                $this->value = 'home';
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
            case "center":
                $this->value = 1;
                break;
            case "home":
                $this->value = 2;
                break;
            default:
//                throw new \InvalidArgumentException("Invalid type '{$this->value}'");
                break;
        }

        return $this->value;
    }
}
