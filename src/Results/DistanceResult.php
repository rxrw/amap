<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:25
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class DistanceResult extends Result
{

    protected function setData()
    {
        return $this->original->results;
    }
}