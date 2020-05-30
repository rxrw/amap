<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 09:46
 */

namespace Reprover\Amap\Gateways\Inputtips;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\InputTipsResult;

class InputTipsGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/assistant/inputtips";
    protected $rules = [
        "key" => "required",
        "keywords" => "required",
        "type" => "nullable",
        "location" => "nullable",
        "city" => "nullable",
        "citylimit" => "nullable",
        "datatype" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return InputTipsResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new InputTipsResult($this->sendRequest());
    }
}