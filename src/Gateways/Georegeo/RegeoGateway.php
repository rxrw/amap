<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 18:29
 */

namespace Reprover\Amap\Gateways\Georegeo;


use Reprover\Amap\Gateways\Gateway;
use Reprover\Amap\Results\RegeoResult;

class RegeoGateway extends Gateway
{

    protected $uri = "http://restapi.amap.com/v3/geocode/regeo";
    protected $rules = ["key" => "required", "location" => "required", "poitype" => "nullable", "radius" => "nullable", "extensions" => "nullable", "batch" => "nullable", "callback" => "nullable", "homeorcorp" => "nullable"];


    /**
     * @return RegeoResult
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function ask()
    {
        return new RegeoResult($this->sendRequest());
    }

    protected function unWrapParams()
    {
        if (is_array($this->params['location']) && !isset($this->params['location']['longitude']))
            $this->params['location'] = $this->params['location']['longitude'] . "|" . $this->params['location']['latitude'];
        else if (is_array($this->params['location'])) {
            $locations = [];
            foreach ($this->params['location'] as $k => $v) {
                $locations[] = $v['longitude'] . "|" . $v['latitude'];
            }

            $this->params['location'] = implode(",", $locations);
        }
    }
}