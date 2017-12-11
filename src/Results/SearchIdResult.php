<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:15
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class SearchIdResult extends Result
{

    protected function setData()
    {
        return $this->original->pois;
    }
}