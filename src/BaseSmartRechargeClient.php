<?php


namespace ShegunBabs\SmartRechargeApi;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

class BaseSmartRechargeClient implements SmartRechargeClientInterface
{

    const DEFAULT_API_BASE = 'https://smartrecharge.ng/api/v2/';


    private array $config;


    private array $defaultOpts;


    public function __construct($apikey)
    {
        $config = [
            'api_key' => $apikey,
        ];

        $this->defaultOpts = [
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];
        $this->config = array_merge($this->defaultOpts, $config);
    }


    public function getApiBase(): string
    {
        return self::DEFAULT_API_BASE;
    }


    public function getApiKey(): string
    {
        return $this->config['apikey'];
    }


    public function getOpts(): string
    {
        return $this->defaultOpts;
    }


    public function request($method, $path, $params, $opts)
    {
        if (is_array($opts)) {
            $this->defaultOpts = array_merge($this->defaultOpts, $opts);
        }

        $client = new Client([
            'base_uri' => self::DEFAULT_API_BASE,
            'http_errors' => false,
        ]);

        $opts = $this->getOpts();

        is_array($params)
            ? $opts = array_merge($opts, ['json' => $params])
            : "";

        try {
            $response = $client->request($method, $path, $opts)->getBody();
            return json_decode($response, true);
        } catch (RequestException | \Exception | TransferException $exception) {
            return [
                'status' => 'error',
                'message' => 'Error: ' .$exception->getMessage(),
            ];
        }
    }
}