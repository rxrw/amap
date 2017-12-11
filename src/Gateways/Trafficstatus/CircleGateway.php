<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 09:53
 */

namespace Reprover\Amap\Gateways\Trafficstatus;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\TrafficstatusResult;

class CircleGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/traffic/status/circle";
    protected $rules = [
        "key" => "required",
        "level" => "nullable",
        "location" => "required",
        "radius" => "nullable",
        "extensions" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return TrafficstatusResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new TrafficstatusResult($this->sendRequest());
    }
}