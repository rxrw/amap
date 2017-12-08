<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:18
 */

namespace Reprover\Amap\Gateways\Direction;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\BicyclingResult;

class BicyclingGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v4/direction/bicycling";
    protected $rules = [
        "key" => "required",
        "origin" => "required",
        "destination" => "required"
    ];

    /**
     * @return BicyclingResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new BicyclingResult($this->sendRequest());
    }
}