<?php


namespace SmartRechargeApi\Services;


class Airtime extends AbstractService
{



    public function buyAirtime(array $params) : array
    {
        $url_query = http_build_query($params);
        $api_key = $this->getApiKey();
        $path = 'airtime/?';


    }
}