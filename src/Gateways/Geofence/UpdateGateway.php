<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:17
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GenfenceupdateResult;

class UpdateGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v4/geofence/meta";
    protected $rules=[
        "name" => "required",
        "center" => "unique|required",
        "radius" => "unique|required",
        "points" => "unique",
        "enable" => "required",
        "valid_time" => "nullable",
        "fixed_date" => "least",
        "repeat" => "least",
        "time"=>"nullable",
        "desc"=>"nullable",
        "alert_condition"=>"nullable"
    ];

    /**
     * @return GenfenceupdateResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GenfenceupdateResult($this->sendRequest());
    }

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function sendRequest()
    {
        return $this->patch($this->uri, $this->params);
    }
}