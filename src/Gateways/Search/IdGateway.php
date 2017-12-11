<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:00
 */

namespace Reprover\Amap\Gateways\Search;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\SearchIdResult;

class IdGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/place/detail";
    protected $rules=[
        "key"=>"required",
        "id"=>"required",
        "sig"=>"nullable",
        "output"=>"nullable"
    ];

    /**
     * @return SearchIdResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new SearchIdResult($this->sendRequest());
    }
}