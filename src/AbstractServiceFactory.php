<?php


namespace SmartRechargeApi;


abstract class AbstractServiceFactory
{

    private SmartRechargeClient $client;


    private array $services;


    public function __construct(SmartRechargeClient $smartRechargeClient)
    {
        $this->client = $smartRechargeClient;
        $this->services = [];
    }


    abstract protected function getServiceClass($name);


    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);

        if ( !empty($serviceClass) )
        {
            if ( !array_key_exists($name, $this->services) )
            {
                $this->services[$name] = new $serviceClass($this->client);
            }
            return $this->services[$name];
        }
        trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}