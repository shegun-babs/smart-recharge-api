<?php


namespace SmartRechargeApi\Services;


class Balance extends AbstractService
{

    protected $path = "http://smartrecharge.ng/api/v1/http.php?";


    private function getBalances()
    {
        $params = http_build_query(
            ['balance' => "true", 'api_key' => $this->getApiKey()]
        );

        $path = $this->path.$params;

        return $this->request('GET', $path);
    }


    public function wallet() : string
    {
        return $this->getBalances()['wallet'];
    }


    public function sms() : string
    {
        return $this->getBalances()['sms'];
    }
}