<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 09:55
 */

namespace Reprover\Amap\Gateways\Trafficstatus;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\TrafficStatusResult;

class RoadGateway extends Gateway
{
    protected $uri = "http://restapi.amap.com/v3/traffic/status/road";
    protected $rules = [
        "key" => "required",
        "level" => "nullable",
        "name" => "required",
        "extensions" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable",
        "city" => "switch",
        "adcode" => "switch"
    ];

    /**
     * @return TrafficStatusResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new TrafficStatusResult($this->sendRequest());
    }
}