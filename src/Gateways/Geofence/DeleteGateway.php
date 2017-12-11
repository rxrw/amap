<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:24
 */

namespace Reprover\Amap\Gateways\Geofence;


use Reprover\Amap\Gateways\Gateway;

class DeleteGateway extends Gateway
{

    protected $uri = 'http://restapi.amap.com/v4/geofence/meta';
    protected $rules = ["key" => "required", "gid" => "required"];

    /**
     * @return DeleteGateway
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new DeleteGateway($this->sendRequest());
    }

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function sendRequest()
    {
        return $this->delete($this->uri, $this->params);
    }

    protected function setUri($endpoint)
    {
        return $endpoint . "?key=" . $this->config->get("key") . "&gid=" . $this->config->get("gid");
    }
}