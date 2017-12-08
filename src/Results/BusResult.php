<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 14:52
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;
use Reprover\Amap\Traits\HasDistance;
use Reprover\Amap\Traits\HasTaxiCost;

class BusResult extends Result
{
    use HasTaxiCost, HasDistance;

    protected function setData()
    {
        $this->taxiCost = $this->original->route->taxi_cost;
        $this->distance = $this->original->route->distance;
        return $this->original->route->transits;
    }


}