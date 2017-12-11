<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 18:19
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;
use stdClass;

class IpResult extends Result
{

    protected function setData()
    {
        $std=new StdClass();
        $std->province=$this->original->province;
        $std->city=$this->original->city;
        $std->adcode=$this->original->adcode;
        $std->rectangle=$this->original->rectangle;
        return $std;
    }
}