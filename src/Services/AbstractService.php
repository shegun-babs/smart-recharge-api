<?php


namespace SmartRechargeApi\Services;


use SmartRechargeApi\SmartRechargeClient;

abstract class AbstractService
{

    protected $client;
    protected $apikey;

    /**
     * @return SmartRechargeClient
     */
    public function getClient(): SmartRechargeClient
    {
        return $this->client;
    }


    /**
     * AbstractService constructor.
     * @param $client
     */
    public function __construct(SmartRechargeClient $client)
    {
        $this->client = $client;
        $this->apikey = $client->getApiKey();
    }


    public function getApiKey() : string {
        return $this->apikey;
    }


    protected static function formatParams($params = null)
    {
        if ( null === $params ) {
            return null;
        }

        array_walk_recursive($params, function (&$value, $key) use (&$params){
            if ( empty($value) ){
                unset($params[$key]);
            }
        });

        return $params;
    }


    protected function request($method, $path, $params=[], $opts=[])
    {
        return $this->getClient()->request($method, $path, static::formatParams($params), $opts);
    }

}