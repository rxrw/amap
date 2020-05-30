<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:27
 */

namespace Reprover\Amap\Gateways\Staticmaps;


use Reprover\Amap\Gateways\Gateway;

class StaticMapsGateway extends Gateway
{

    protected $uri="http://restapi.amap.com/v3/staticmap";
    protected $rules=[
        "key"=>"required",
        "location"=>"required",
        "zoom"=>"nullable",
        "size"=>"nullable",
        "scale"=>"nullable",
        "markers"=>"nullable",
        "labels"=>"nullable",
        "paths"=>"nullable",
        "traffic"=>"nullable",
        "sig"=>"nullable",
    ];

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return $this->sendRequest();
    }
}