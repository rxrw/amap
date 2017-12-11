<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:29
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GenfencestatusResult;

class StatusGateway extends Gateway
{

    protected $uri = 'http://restapi.amap.com/v4/geofence/status';
    protected $rules = [
        "key" => "required",
        "diu" => "required",
        "uid" => "nullable",
        "locations" => "required",
        "sig" => "nullable"
    ];

    /**
     * @return GenfencestatusResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GenfencestatusResult($this->sendRequest());
    }
}