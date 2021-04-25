<?php


namespace SmartRechargeApi;


use SmartRechargeApi\Services\Airtime;
use SmartRechargeApi\Services\DataShare;
use SmartRechargeApi\Services\DirectData;

/**
 * Class CoreServiceFactory
 * @property Airtime $airtime
 * @property DataShare $dataShare
 * @property DirectData $directData
 * @package SmartRechargeApi
 */

class CoreServiceFactory extends AbstractServiceFactory
{

    private static $classMap = [
        "airtime" => Airtime::class,
        "directData" => DataShare::class,
        "dataShare" => DataShare::class,
    ];

    public function getServiceClass($name)
    {
        return self::$classMap[$name] ?? null;
    }
}