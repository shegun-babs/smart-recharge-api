<?php


namespace SmartRechargeApi;


use SmartRechargeApi\Services\Airtime;
use SmartRechargeApi\Services\Balance;
use SmartRechargeApi\Services\DataShare;
use SmartRechargeApi\Services\DirectData;
use SmartRechargeApi\Services\Service;

/**
 * Class CoreServiceFactory
 * @property Airtime $airtime
 * @property DataShare $dataShare
 * @property DirectData $directData
 * @property Balance $balance
 * @property Service $service
 *
 * @package SmartRechargeApi
 */

class CoreServiceFactory extends AbstractServiceFactory
{

    private static $classMap = [
        "airtime" => Airtime::class,
        "directData" => DataShare::class,
        "dataShare" => DataShare::class,
        'balance' => Balance::class,
        'service' => Service::class,
    ];

    public function getServiceClass($name)
    {
        return self::$classMap[$name] ?? null;
    }
}