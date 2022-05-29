<?php


namespace Danilo9\GetIp\Entity;

/**
 * Class PrivacyEntiry
 * @package Danilo9\GetIp\Entity
 */
class PrivacyEntity
{
    private bool $proxy = false;
    private bool $mobile = false;
    private bool $hosting = false;

    /**
     * @param bool $proxy
     * @param bool $mobile
     * @param bool $hosting
     * @return $this
     */
    public function set(bool $proxy, bool $mobile, bool $hosting): PrivacyEntity
    {
        $this->setProxy($proxy);
        $this->setMobile($mobile);
        $this->setHosting($hosting);
        return $this;
    }

    /**
     * @param bool $proxy
     */
    public function setProxy(bool $proxy): void
    {
        $this->proxy = $proxy;
    }

    /**
     * @return bool
     */
    public function getProxy(): bool
    {
        return $this->proxy;
    }

    /**
     * @param bool $mobile
     */
    public function setMobile(bool $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return bool
     */
    public function getMobile(): bool
    {
        return $this->mobile;
    }

    /**
     * @param bool $hosting
     */
    public function setHosting(bool $hosting): void
    {
        $this->hosting = $hosting;
    }

    /**
     * @return bool
     */
    public function getHosting(): bool
    {
        return $this->hosting;
    }


    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'proxy' => $this->getProxy(),
            'mobile' => $this->getMobile(),
            'hosting' => $this->getHosting(),
        ];
    }
}
