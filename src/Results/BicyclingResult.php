<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:17
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;

class BicyclingResult extends Result
{

    protected function setData()
    {
        return $this->original->data->paths;
    }

    protected function setStatus()
    {
        $this->status = $this->original->errcode == 0 ? 1 : 0;
    }

    protected function setInfoCode()
    {
        $this->infocode = intval($this->original->errcode);
        $this->info = $this->original->errmsg;
    }
}