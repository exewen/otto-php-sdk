<?php

declare(strict_types=1);

namespace Exewen\Otto;

use Exewen\Otto\Constants\OttoEnum;
use Exewen\Otto\Contract\OttoInterface;
use Exewen\Otto\Exception\OttoException;
use Exewen\Otto\Services\AuthService;
use Exewen\Otto\Services\OrdersService;
use Exewen\Otto\Services\ShippingsService;
use Exewen\Config\Contract\ConfigInterface;

class Otto implements OttoInterface
{
    private $config;
    private $authService;

    public function __construct(
        ConfigInterface $config,
        AuthService     $authService
    )
    {
        $this->config      = $config;
        $this->authService = $authService;
    }

    public function getToken(string $clientId, string $clientSecret)
    {
        $result = json_decode($this->authService->getToken($clientId, $clientSecret), true);
        if (!isset($result['access_token'])) {
            throw new OttoException('Otto:获取token异常');
        }
        return $result;
    }

}
