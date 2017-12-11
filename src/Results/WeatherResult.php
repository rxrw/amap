<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:33
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class WeatherResult extends Result
{

    public $forecast;

    protected function setData()
    {
        $this->forecast = $this->original->forecast;
        return $this->original->lives;
    }

}