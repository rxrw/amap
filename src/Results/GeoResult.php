<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 16:41
 */

namespace Reprover\Amap\Results;

use Reprover\Amap\Support\Result;

class GeoResult extends Result
{

    protected function setData()
    {
        return $this->original->geocodes;
    }

}