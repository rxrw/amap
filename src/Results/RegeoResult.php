<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 18:30
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class RegeoResult extends Result
{

    protected function setData()
    {
        return $this->original->regeocode;
    }
}