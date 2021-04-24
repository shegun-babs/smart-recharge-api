<?php


namespace ShegunBabs\SmartRechargeApi;


interface SmartRechargeClientInterface
{

    public function getApiBase();


    public function getApiKey();


    public function request($method, $path, $params, $opts);

}