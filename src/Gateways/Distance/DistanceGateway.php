<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:25
 */

namespace Reprover\Amap\Gateways\Distance;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\DistanceResult;

class DistanceGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/distance";
    protected $rules = [
        "key" => "required",
        "origins" => "required",
        "destination" => "required",
        "type" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return DistanceResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new DistanceResult($this->sendRequest());
    }
}