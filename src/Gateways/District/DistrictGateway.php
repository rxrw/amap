<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:11
 */

namespace Reprover\Amap\Gateways\District;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\DistrictResult;

class DistrictGateway extends Gateway
{
    protected $uri = "http://restapi.amap.com/v3/config/district";
    protected $rules = [
        "key" => "required",
        "keywords" => "nullable",
        "subdistrict" => "nullable",
        "page" => "nullable",
        "offset" => "nullable",
        "extensions" => "nullable",
        "filter" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return DistrictResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new DistrictResult($this->sendRequest());
    }
}