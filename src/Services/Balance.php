<?php


namespace SmartRechargeApi\Services;


class Balance extends AbstractService
{

    protected $path = 'others/get_account_balance.php/';

    public function getBalances()
    {
        $path = $this->path. '?api_key=' . $this->getApiKey();

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

    public function __get($name)
    {
        if ( method_exists($this, $name) ){
            return $this->{$name}();
        }
    }
}