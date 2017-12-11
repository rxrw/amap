<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 10:14
 */

namespace Reprover\Amap\Traits;


trait HasErrCode
{

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