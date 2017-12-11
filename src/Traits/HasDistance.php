<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:11
 */

namespace Reprover\Amap\Traits;


trait HasDistance
{
    public $distance;

    public function getDistance()
    {
        return $this->distance;
    }
}