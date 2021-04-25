<?php

use SmartRechargeApi\SmartRechargeClient;


test('entry class can be instantiated', function ()
{
    $smartRecharge = new SmartRechargeClient("abcdefg");
    expect($smartRecharge)->toBeObject();
});


it('has api_key in request params', function ()
{
    $api_key = "AbcDefGhi";

    $smartRecharge = new SmartRechargeClient($api_key);

    $innerApiKey = $smartRecharge->airtime->getApiKey();

    $this->assertEquals($api_key, $innerApiKey);
});