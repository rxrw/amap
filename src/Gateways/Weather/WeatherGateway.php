<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 09:43
 */

namespace Reprover\Amap\Gateways\Weather;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\WeatherResult;

class WeatherGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/weather/weatherInfo";
    protected $rules = [
        "key" => "required",
        "city" => "required",
        "extensions" => "nullable",
    ];

    /**
     * @return WeatherResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new WeatherResult($this->sendRequest());
    }
}