<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:11
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GeofenceshowResult;

class ShowGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v4/geofence/meta";
    protected $rules = [
        "key" => "required",
        "id" => "nullable",
        "gid" => "nullable",
        "name" => "nullable",
        "page_no" => "nullable",
        "page_size" => "nullable",
        "enable" => "nullable|boolean",
        "start_time" => "nullable|datetime",
        "end_time" => "nullable|datetime"
    ];

    /**
     * @return GeofenceshowResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GeofenceshowResult($this->sendRequest());
    }
}