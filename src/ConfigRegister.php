<?php

declare(strict_types=1);

namespace Exewen\Otto;

use Exewen\Otto\Constants\OttoEnum;
use Exewen\Otto\Contract\OttoInterface;

class ConfigRegister
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                OttoInterface::class => Otto::class,
            ],

            'otto' => [
                'channel_api' => OttoEnum::CHANNEL,
            ],

            'http' => [
                'channels' => [
                    OttoEnum::CHANNEL => [
                        'verify'          => false,
                        'ssl'             => true,
                        'host'            => 'api.otto.market',
                        'port'            => null,
                        'prefix'          => null,
                        'connect_timeout' => 3,
                        'timeout'         => 20,
                        'handler'         => [],
                        'extra'           => [],
                        'proxy'           => [
                            'switch' => false,
                            'http'   => '127.0.0.1:8888',
                            'https'  => '127.0.0.1:8888'
                        ]
                    ],
                ]
            ]


        ];
    }
}
