<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:12
 */

namespace Reprover\Amap\Gateways\Direction;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\DrivingResult;

class DrivingGateway extends Gateway
{
    protected $uri = "http://restapi.amap.com/v3/direction/driving";
    protected $rules=[
        "key"=>"required",
        "origin"=>"required",
        "destination"=>"required",
        "originid"=>"nullable",
        "destinationid"=>"nullable",
        "origintype"=>"nullable",
        "destinationtype"=>"nullable",
        "strategy"=>"nullable",
        "waypoints"=>"nullable",
        "avoidpolygons"=>"nullable",
        "avoidroad"=>"nullable",
        "province"=>"nullable",
        "number"=>"nullable",
        "sig"=>"nullable",
        "callback"=>"nullable",
    ];

    /**
     * @return DrivingResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new DrivingResult($this->sendRequest());
    }
}