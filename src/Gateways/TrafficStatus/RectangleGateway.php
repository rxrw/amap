<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 09:50
 */

namespace Reprover\Amap\Gateways\Trafficstatus;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\TrafficStatusResult;

class RectangleGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/traffic/status/rectangle";
    protected $rules=[
        "key"=>"required",
        "level"=>"nullable",
        "rectangle"=>"required",
        "extensions"=>"nullable",
        "sig"=>"nullable",
        "callback"=>"nullable"
    ];

    /**
     * @return TrafficStatusResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new TrafficStatusResult($this->sendRequest());
    }
}