<?php


namespace SmartRechargeApi\Services;


class Airtime extends AbstractService
{



    public function buyAirtime(array $params) : array
    {
        $params = array_merge(['api_key' => $this->apikey], $params);
        $url_query = http_build_query($params);
        $path = "airtime/?$url_query";
    }
}