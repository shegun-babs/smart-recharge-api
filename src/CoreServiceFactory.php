<?php


namespace SmartRechargeApi;


use SmartRechargeApi\Services\Airtime;
use SmartRechargeApi\Services\Balance;
use SmartRechargeApi\Services\DataShare;
use SmartRechargeApi\Services\DirectData;

/**
 * Class CoreServiceFactory
 * @property Airtime $airtime
 * @property DataShare $dataShare
 * @property DirectData $directData
 * @property Balance $balance
 * @package SmartRechargeApi
 */

class CoreServiceFactory extends AbstractServiceFactory
{

    private static $classMap = [
        "airtime" => Airtime::class,
        "directData" => DataShare::class,
        "dataShare" => DataShare::class,
        'balance' => Balance::class,
    ];

    public function getServiceClass($name)
    {
        return self::$classMap[$name] ?? null;
    }
}