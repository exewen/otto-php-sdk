<?php
declare(strict_types=1);

namespace Exewen\Otto\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class OrdersService
{
    private $httpClient;
    private $driver;
    private $ordersListUrl = '/v4/orders';
    private $ordersDetailUrl = '/v4/orders/{orderId}';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('otto.channel_api');
    }

    public function getOrders(array $params, array $header): string
    {
        $response = $this->httpClient->get($this->driver, $this->ordersListUrl, $params, $header);
        return $response->getBody()->getContents();
    }

    public function getOrderDetail(string $orderId, array $params, array $header): string
    {
        $url    = str_replace('{orderId}', $orderId, $this->ordersDetailUrl);
        $response =  $this->httpClient->get($this->driver, $url, $params, $header);
        return $response->getBody()->getContents();
    }


}