<?php
declare(strict_types=1);

namespace Exewen\Otto;

use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\Otto\Contract\OttoInterface;

/**
 * @method static array getToken(string $clientId, string $clientSecret)
 */
class OttoFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return OttoInterface::class;
    }

    public static function getProviders(): array
    {
        return [
            LoggerProvider::class,
            HttpProvider::class,
            OttoProvider::class
        ];
    }
}