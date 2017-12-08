<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 18:08
 */

namespace Reprover\Amap\Gateways\Georegeo;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GeoResult;

class GeoGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/geocode/geo";
    protected $rules = [
        "key" => "required",
        "address" => "required",
        "city" => "nullable",
        "batch" => "nullable",
        "callback" => "nullable",
        "sig" => "nullable"];

    /**
     * @return GeoResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GeoResult($this->sendRequest());
    }

}