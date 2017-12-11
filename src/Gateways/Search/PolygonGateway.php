<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:59
 */

namespace Reprover\Amap\Gateways\Search;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\SearchResult;

class PolygonGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/place/polygon";
    protected $rules = [
        "key" => "required",
        "polygon" => "required",
        "keywords" => "nullable",
        "types" => "nullable",
        "offset" => "nullable",
        "page" => "nullable",
        "extensions" => "nullable",
        "sig" => "nullable",
        "callback" => "nullable"
    ];

    /**
     * @return SearchResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new SearchResult($this->sendRequest());
    }
}