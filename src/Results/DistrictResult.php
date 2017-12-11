<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:10
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class DistrictResult extends Result
{

    protected function setData()
    {
        return $this->original->districts;
    }
}