# get_ip

Getting information about IP

Fields that can be obtained:
- continent
- continentCode
- country
- countryCode
- currency
- regionName
- city
- timezone
- privacy
- - proxy
- - mobile
- - hosting
- location
- - lat
- - lon
- zip
- region
- isp
- as
- asname

## Installation

```sh
composer require danilo9/get_ip
```

## Documentation

Declare a class:
```php
use Danilo9\GetIp\GetIp;
$getIp = new GetIp();
```

Options:
```php
$getIp = new GetIp(['lang' => 'ru']);
```

Get information about ip:
```php
$info = $getIp->process('176.59.134.100');
```

The default is ```$_SERVER['REMOTE_ADDR']```

Get information
```php
// Returning string
$info->getStatus();
$info->getIp();
$info->getContinent();
$info->getContinentCode();
$info->getCountry();
$info->getCountryCode();
$info->getCurrency();
$info->getRegionName();
$info->getCity();
$info->getTimezone();
$info->getZip();
$info->getRegion();
$info->toJson();
$info->getLocation()->toJson();
$info->getPrivacy()->toJson();
// int
$info->getLocation()->getLat();
$info->getLocation()->getLon();
//bool
$info->getPrivacy()->getMobile();
$info->getPrivacy()->getProxy();
$info->getPrivacy()->getHosting();
// array
$info->toArray();
$info->getLocation()->toArray();
$info->getPrivacy()->toArray();
```

## License

Apache License 2.0
