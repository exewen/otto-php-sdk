<?php
declare(strict_types=1);

namespace Exewen\Otto\Contract;


use Exewen\Otto\Constants\OttoEnum;

interface OttoInterface
{
    public function getToken(string $clientId, string $clientSecret);

}