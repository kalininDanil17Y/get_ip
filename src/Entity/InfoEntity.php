<?php


namespace Danilo9\GetIp\Entity;

/**
 * Class InfoEntity
 * @package Danilo9\GetIp\Entity
 */
class InfoEntity extends AbstractEntity
{
    private string $status = 'fail';
    private string $ip = '';
    private string $continent = '';
    private string $continentCode = '';
    private string $country = '';
    private string $countryCode = '';
    private string $currency = '';
    private string $regionName = '';
    private string $city = '';
    private string $timezone = '';
    private PrivacyEntity $privacy;
    private LocationEntity $location;
    private string $zip = '';
    private string $region = '';

    public function set(array $info): InfoEntity
    {
        $this->setStatus($info['status']);
        $this->setIp($info['query']);
        $this->setContinent($info['continent'] ?: '');
        $this->setContinentCode($info['continentCode'] ?: '');
        $this->setCountry($info['country'] ?: '');
        $this->setCountryCode($info['countryCode'] ?: '');
        $this->setCurrency($info['currency'] ?: '');
        $this->setRegionName($info['regionName'] ?: '');
        $this->setCity($info['city'] ?: '');
        $this->setTimezone($info['timezone'] ?: '');
        $this->setZip($info['zip'] ?: '');
        $this->setRegion($info['region'] ?: '');

        $this->setPrivacy(
            $info['proxy'] ?: false,
            $info['mobile'] ?: false,
            $info['hosting'] ?: false
        );

        $this->setLocation(
            $info['lat'] ?: 0,
            $info['lon'] ?: 0
        );

        return $this;
    }

    /**
     * @param float $lat
     * @param float $lon
     */
    public function setLocation(float $lat, float $lon): void
    {
        $this->location = (new LocationEntity())->set($lat, $lon);
    }

    /**
     * @return LocationEntity
     */
    public function getLocation(): LocationEntity
    {
        return $this->location;
    }

    /**
     * @param bool $proxy
     * @param bool $mobile
     * @param bool $hosting
     */
    public function setPrivacy(bool $proxy, bool $mobile, bool $hosting): void
    {
        $this->privacy = (new PrivacyEntity())->set($proxy, $mobile, $hosting);
    }

    /**
     * @return PrivacyEntity
     */
    public function getPrivacy(): PrivacyEntity
    {
        return $this->privacy;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip ?: '';
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $continent
     */
    public function setContinent(string $continent): void
    {
        $this->continent = $continent;
    }

    /**
     * @return string
     */
    public function getContinent(): string
    {
        return $this->continent ?: '';
    }

    /**
     * @param string $continentCode
     */
    public function setContinentCode(string $continentCode): void
    {
        $this->continentCode = $continentCode;
    }

    /**
     * @return string
     */
    public function getContinentCode(): string
    {
        return $this->continentCode ?: '';
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country ?: '';
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode ?: '';
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency ?: '';
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->regionName ?: '';
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city ?: '';
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone ?: '';
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip ?: '';
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region ?: '';
    }

    /**
     * @param string $region
     */
    private function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @param string $continentCode
     */
    public function setCountryCode(string $continentCode): void
    {
        $this->continentCode = $continentCode;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param string $regionName
     */
    public function setRegionName(string $regionName): void
    {
        $this->regionName = $regionName;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'status' => $this->getStatus(),
            'ip' => $this->getIp(),
            'continent' => $this->getContinent(),
            'continentCode' => $this->getContinentCode(),
            'country' => $this->getCountry(),
            'countryCode' => $this->getCountryCode(),
            'currency' => $this->getCurrency(),
            'regionName' => $this->getRegionName(),
            'city' => $this->getCity(),
            'timezone' => $this->getTimezone(),
            'privacy' => $this->getPrivacy()->toArray(),
            'location' => $this->getLocation()->toArray(),
            'zip' => $this->getZip(),
            'region' => $this->getRegion()
        ];
    }
}
