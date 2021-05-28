<?php


namespace SmartRechargeApi\Services;


class Service extends AbstractService
{


    /**
     * @return array
     */
    public function listMainServices(): array
    {
        //return ['true'];
        $path = 'others/get_services.php?api_key=' .$this->getApiKey();
        return $this->request('POST', $path);
    }


    /**
     * @param $service_code
     * @return array
     */
    public function listSubServices($service_code): array
    {
        $path = "others/get_sub_services.php?api_key=".$this->getApiKey()."&service_code=$service_code";
        return $this->request('POST', $path);
    }


    /**
     * @param $service_code
     * @param $sub_service_code
     * @return array
     */
    public function listAvailableServices($service_code, $sub_service_code): array
    {
        $path = "others/get_available_services.php?api_key".$this->getApiKey()."=&service_code=$service_code&sub_service_code=$sub_service_code";
        return $this->request('POST', $path);
    }
}