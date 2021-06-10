<?php


namespace SmartRechargeApi\Services;


class DirectData extends AbstractService
{

    protected string $path = "directdata/?";


    /**
     * @param array $params ['product_code' => '...', 'phone' => '...']
     * @return array
     */
    public function buyData(array $params): array
    {
        $params = array_merge(['api_key' => $this->apikey], $params);
        $url_query = http_build_query($params);
        $path = $this->path.$url_query;

        return $this->request("POST", $path);
    }


    /**
     * @param $order_id
     * @return array
     */
    public function checkDataOrder($order_id): array
    {
        $params = ['api_key' => $this->getApiKey(), 'task' => 'check_status', 'order_id' => $order_id];
        $path = $this->path.http_build_query($params);

        return $this->request("GET", $path);
    }
}