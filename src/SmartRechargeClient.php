<?php


namespace SmartRechargeApi;


use SmartRechargeApi\Services\Airtime;
use SmartRechargeApi\Services\Balance;

/**
 * Class SmartRechargeClient
 * @property Airtime $airtime
 * @property Balance $balance
 * @package SmartRechargeApi
 */

class SmartRechargeClient extends BaseSmartRechargeClient
{

    private $coreServiceFactory;


    public function __get($name)
    {
        if ( null === $this->coreServiceFactory ) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}