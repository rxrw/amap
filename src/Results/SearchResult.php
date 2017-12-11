<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:30
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class SearchResult extends Result
{

    protected function setData()
    {
        $this->suggestion=$this->original->suggestion;
        return $this->original->pois;
    }
}