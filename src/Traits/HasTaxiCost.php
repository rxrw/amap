<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 15:10
 */

namespace Reprover\Amap\Traits;


trait HasTaxiCost
{
    protected $taxiCost;

    public function getTaxiCost(){
        return $this->taxiCost;
    }

}