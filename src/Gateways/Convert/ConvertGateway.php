<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:30
 */

namespace Reprover\Amap\Gateways\Convert;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\ConvertResult;

class ConvertGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/assistant/coordinate/convert";
    protected $rules=[
        "key"=>"required",
        "locations"=>"required",
        "coordsys"=>"nullable",
        "sig"=>"nullable"
    ];

    /**
     * @return ConvertResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new ConvertResult($this->sendRequest());
    }
}