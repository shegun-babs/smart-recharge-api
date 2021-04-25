<?php


namespace SmartRechargeApi;


use ShegunBabs\SmartRechargeApi\BaseSmartRechargeClient;

/**
 * Class SmartRechargeClient
 *
 * @package SmartRechargeApi
 */

class SmartRechargeClient extends BaseSmartRechargeClient
{

    private object $coreServiceFactory;


    public function __get($name)
    {
        if ( null === $this->coreServiceFactory ) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}