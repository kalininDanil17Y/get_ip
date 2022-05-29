<?php


namespace Danilo9\GetIp;

use BadMethodCallException;
use Danilo9\GetIp\Entity\InfoEntity;
use Danilo9\GetIp\Exception\RequestFailException;

/**
 * Class GetIp
 * @package Danilo9\GetIp
 */
class GetIp
{
    /**
     * GetIp constructor.
     */
    public function __construct()
    {
        // Created
    }

    /**
     * @param String $ip
     * @return InfoEntity
     * @throws RequestFailException
     */
    public function process(string $ip = ''): InfoEntity
    {
        if(empty($ip)) $ip = $_SERVER['REMOTE_ADDR'];

        $info = $this->requestGET(sprintf("https://pro.ip-api.com/json/%s", $ip), [
            //'fields' => 'status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,reverse,mobile,proxy,hosting,query,message',
            'fields' => 66842623,
            'key' => 'ipapiq9SFY1Ic4',
            'lang' => 'ru'
        ], [
            'Accept-Language: ru,ru-RU;q=0.9,en;q=0.8',
            'Origin: https://members.ip-api.com',
            'Referer: https://members.ip-api.com/',
        ]);

        $info = json_decode($info, true, JSON_UNESCAPED_UNICODE);

        if ($info['status'] === 'fail')
        {
            throw new RequestFailException("Error");
        }

        return (new InfoEntity())->set($info);
    }

    /**
     * @param $url
     * @param array $params
     * @param array|string[] $headers
     * @return bool|string
     */
    private function requestGET($url, array $params = [], array $headers = ["Content-Type: multipart/form-data"]){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if(count($params) > 0 ) {
            $query = http_build_query($params);
            curl_setopt($ch, CURLOPT_URL, "$url?$query");
        } else
            curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
