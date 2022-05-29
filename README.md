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


## Plugins


| Plugin | README |
| ------ | ------ |
| Dropbox | [plugins/dropbox/README.md][PlDb] |
| GitHub | [plugins/github/README.md][PlGh] |
| Google Drive | [plugins/googledrive/README.md][PlGd] |
| OneDrive | [plugins/onedrive/README.md][PlOd] |
| Medium | [plugins/medium/README.md][PlMe] |
| Google Analytics | [plugins/googleanalytics/README.md][PlGa] |

## Documentation

Declare a class:
```php
use Danilo9\GetIp\GetIp;
$getIp = new GetIp();
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