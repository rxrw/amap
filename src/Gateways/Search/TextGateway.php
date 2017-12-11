<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:46
 */

namespace Reprover\Amap\Gateways\Search;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\SearchResult;

class TextGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/place/text";
    protected $rules=[
        "key"=>"required",
        "keywords"=>"switch",
        "types"=>"switch",
        "city"=>"nullable",
        "citylimit"=>"nullable",
        "children"=>"nullable",
        "offset"=>"nullable",
        "page"=>"nullable",
        "building"=>"nullable",
        "floor"=>"nullable",
        "extensions"=>"nullable",
        "sig"=>"nullable",
        "callback"=>"nullable"
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