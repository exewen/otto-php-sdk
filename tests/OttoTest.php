<?php
declare(strict_types=1);

namespace ExewenTest\Otto;

use Exewen\Otto\OttoFacade;

class OttoTest extends Base
{

    /**
     * 测试订单信息
     * @return void
     */
    public function testToken()
    {
        $clientId     = getenv('OTTO_CLIENT_ID');
        $clientSecret = getenv('OTTO_CLIENT_SECRET');
        $response     = OttoFacade::getToken($clientId, $clientSecret);
        $this->assertNotEmpty($response);
    }


}