<?php


namespace SmartRechargeApi\Services;


class Airtime extends AbstractService
{

    protected $path = "airtime/?";


    /**
     * @param array $params ['product_code' => '...', 'phone' => '...', 'amount' => '...', 'callback' => '...']
     * @return array
     */
    public function buyAirtime(array $params) : array
    {
        $params = array_merge(['api_key' => $this->apikey], $params);
        $url_query = http_build_query($params);
        $path = $this->path.$url_query;

        return $this->request("POST", $path);
    }


    public function checkAirtime($params): array
    {
        $params = array_merge(['api_key' => $this->getApiKey()], $params);
        $path = $this->path.http_build_query($params);

        return $this->request("GET", $path);
    }
}