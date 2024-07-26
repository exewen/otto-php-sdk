<?php
declare(strict_types=1);

namespace Exewen\Otto\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class AuthService
{
    private $httpClient;
    private $driver;
    private $tokenUrl = '/v1/token';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('otto.channel_api');
    }

    public function getToken(string $clientId, string $clientSecret): string
    {
        $params = [
            'grant_type'    => 'client_credentials',
            'client_id'     => $clientId,
            'client_secret' => $clientSecret,
            'scope'         => 'orders shipments',
        ];
        return $this->httpClient->post($this->driver, $this->tokenUrl, $params, [], [], 'form_params');
    }


}