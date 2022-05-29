<?php


namespace Danilo9\GetIp\Entity;

/**
 * Class AbstractEntity
 * @package Danilo9\GetIp\Entity
 */
class AbstractEntity
{
    /**
     * AbstractEntity constructor.
     */
    public function __construct()
    {}

    /*
     *
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}
