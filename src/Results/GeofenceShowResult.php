<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:11
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;
use Reprover\Amap\Traits\HasErrCode;

class GeofenceShowResult extends Result
{

    use HasErrCode;

    protected function setData()
    {
        return $this->original->data;
    }
}