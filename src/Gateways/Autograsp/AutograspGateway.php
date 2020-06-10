<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:24
 */

namespace Reprover\Amap\Gateways\AutoGrasp;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\AutoGraspResult;

class AutograspGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/autograsp";
    protected $rules=[
        "key"=>"required",
        "cardid"=>"required",
        "locations"=>"required",
        "time"=>"required",
        "direction"=>"required",
        "speed"=>"required",
    ];

    /**
     * @return AutoGraspResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new AutoGraspResult($this->sendRequest());
    }
}