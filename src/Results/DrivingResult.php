<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:04
 */

namespace Reprover\Amap\Results;


use Reprover\Amap\Support\Result;
use Reprover\Amap\Traits\HasTaxiCost;

class DrivingResult extends Result
{
    use HasTaxiCost;

    protected function setData()
    {
        $this->taxiCost = $this->original->route->taxi_cost;
        return $this->original->route->paths;
    }
}