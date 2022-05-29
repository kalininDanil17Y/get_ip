<?php


namespace Danilo9\GetIp\Entity;

/**
 * Class LocationEntity
 * @package Danilo9\GetIp\Entity
 */
class LocationEntity
{
    private float $lat = 0;
    private float $lon = 0;

    /**
     * @param float $lat
     * @param float $lon
     * @return $this
     */
    public function set(float $lat, float $lon): LocationEntity
    {
        $this->setLat($lat);
        $this->setLon($lon);
        return $this;
    }

    /**
     * @param float $lat
     */
    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lon
     */
    public function setLon(float $lon): void
    {
        $this->lon = $lon;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }


    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'lat' => $this->getLat(),
            'lon' => $this->getLon(),
        ];
    }
}
