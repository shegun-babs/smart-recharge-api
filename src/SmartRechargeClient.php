<?php


namespace SmartRechargeApi;


use SmartRechargeApi\Services\Airtime;
use SmartRechargeApi\Services\Balance;
use SmartRechargeApi\Services\Service;

/**
 * Class SmartRechargeClient
 * @property Airtime $airtime
 * @property Balance $balance
 * @property Service $service
 *
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