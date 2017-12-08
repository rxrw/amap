<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 14:50
 */

namespace Reprover\Amap\Gateways\Direction;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\BusResult;

class BusGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/direction/transit/integrated";
    protected $rules = [
        "key" => "required",
        "origin" => "required",
        "destination" => "required",
        "city" => "required",
        "cityd" => "nullable",
        "extensions" => "nullable",
        "strategy" => "nullable",
        "nightflag" => "nullable",
        "date" => "nullable",
        "time" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return BusResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new BusResult($this->sendRequest());
    }
}