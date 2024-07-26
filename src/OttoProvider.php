<?php
declare(strict_types=1);

namespace Exewen\Otto;

use Exewen\Di\ServiceProvider;
use Exewen\Otto\Contract\OttoInterface;

class OttoProvider extends ServiceProvider
{

    /**
     * 服务注册
     * @return void
     */
    public function register()
    {
        $this->container->singleton(OttoInterface::class);
    }

}