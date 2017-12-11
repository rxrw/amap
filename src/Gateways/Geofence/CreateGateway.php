<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:04
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GeofenceCreateResult;

class CreateGateway extends Gateway
{

    protected $uri = 'http://restapi.amap.com/v4/geofence/meta';
    protected $rules = [
        "name" => "required",
        "center" => "switchMany:location:center,radius",
        "radius" => "switchMany:location:center,radius",
        "points" => "switchMany:location:points",
        "enable" => "required",
        "valid_time" => "nullable",
        "fixed_date" => "switch:time",
        "repeat" => "switch:time",
        "time" => "nullable",
        "desc" => "nullable",
        "alert_condition" => "nullable",
    ];

    /**
     * @return GeofenceCreateResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GeofenceCreateResult($this->sendRequest());
    }

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function sendRequest()
    {
        return $this->post($this->uri, $this->params);
    }

    protected function setUri($endpoint)
    {
        return $endpoint . "?key=" . $this->config->get("key");
    }
}