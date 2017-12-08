<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 14:45
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class WalkingResult extends Result
{

    protected function setData()
    {
        return $this->original->route;
    }
}