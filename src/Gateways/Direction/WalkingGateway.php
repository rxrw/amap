<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 14:40
 */

namespace Reprover\Amap\Gateways\Direction;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\WalkingResult;

class WalkingGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/direction/walking";
    protected $rules = ["key" => "required", "origin" => "required", "destination" => "required", "sig" => "nullable", "callback" => "nullable"];

    /**
     * @return WalkingResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new WalkingResult($this->sendRequest());
    }
}