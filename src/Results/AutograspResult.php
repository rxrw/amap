<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:22
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

//抓路服务，仅适用于企业
class AutograspResult extends Result
{

    protected function setData()
    {
        return $this->original->roads;
    }
}