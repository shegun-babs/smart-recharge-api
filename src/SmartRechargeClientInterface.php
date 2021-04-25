<?php


namespace SmartRechargeApi;


interface SmartRechargeClientInterface
{

    public function getApiBase();


    public function getApiKey();


    public function request($method, $path, $params, $opts);

}