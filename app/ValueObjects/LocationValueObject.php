<?php

namespace App\ValueObjects;

use Grimzy\LaravelMysqlSpatial\Types\Point;

final class LocationValueObject
{
    public $value;

    public function __construct($location)
    {
        if (!$location instanceof Point) {
            if (!isset($location['latitude']) || !isset($location['longitude'])) {
                throw new \DomainException("Invalid location.");
            }

            $this->value = $location;
        }else{
            $this->value['latitude'] = $location ? sprintf("%.7f", $location->getLat()) : "";
            $this->value['longitude'] = $location ? sprintf("%.7f", $location->getLng()) : "";
        }
    }

    public function __toString()
    {
        return (string)$this->value;
    }

    public function isEqualTo(self $location): bool
    {
        return $this->value == $location->value;
    }

    public function location(): array
    {
        return [
            'latitude' => $this->value ? sprintf("%.7f", $this->value->getLat()) : "",
            'longitude' => $this->value ? sprintf("%.7f", $this->value->getLng()) : "",
        ];
    }

    public function point(): Point
    {
        return new Point($this->value['latitude'], $this->value['longitude']);

    }
}
