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


    public function checkAirtime($order_id): array
    {
        $params = ['api_key' => $this->getApiKey(), 'task' => 'check_status', 'order_id' => $order_id];
        $path = $this->path.http_build_query($params);

        return $this->request("GET", $path);
    }
}