<?php
declare(strict_types=1);

namespace Exewen\Otto\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class ShippingsService
{
    private $httpClient;
    private $driver;
    private $setShipmentsUrl = '/v1/shipments';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('otto.channel_api');
    }


    public function setShipments(array $params, array $header)
    {
        $response = $this->httpClient->post($this->driver, $this->setShipmentsUrl, $params, $header);
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }

}