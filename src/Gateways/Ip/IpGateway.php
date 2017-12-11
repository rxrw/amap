<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:17
 */

namespace Reprover\Amap\Gateways\Ip;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\IpResult;

class IpGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/ip";
    protected $rules=[
        "key"=>"required",
        "ip"=>"nullable",
        "sig"=>"nullable",
    ];

    /**
     * @return IpResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new IpResult($this->sendRequest());
    }
}