<?php

declare(strict_types=1);

use Exewen\Http\Middleware\LogMiddleware;
use Exewen\Otto\Constants\OttoEnum;

return [
    'channels' => [
        OttoEnum::CHANNEL => [
            'verify'          => false,
            'ssl'             => true,
            'host'            => 'api.otto.market',
            'port'            => null,
            'prefix'          => null,
            'connect_timeout' => 3,
            'timeout'         => 20,
            'handler'         => [
                LogMiddleware::class
            ],
            'extra'           => [],
            'proxy'           => [
                'switch' => false,
                'http'   => '127.0.0.1:8888',
                'https'  => '127.0.0.1:8888'
            ]
        ],
    ]
];