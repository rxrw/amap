<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:22
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\GenfenceenableResult;

class EnableGateway extends Gateway
{

    protected $uri = 'http://restapi.amap.com/v4/geofence/meta';
    protected $rules = [
        "enable" => "nullable"
    ];

    /**
     * @return GenfenceenableResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new GenfenceenableResult($this->sendRequest());
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