<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:31
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class ConvertResult extends Result
{

    protected function setData()
    {
        return explode(";",$this->original->locations);
    }
}