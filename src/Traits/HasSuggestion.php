<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 17:54
 */

namespace Reprover\Amap\Traits;


class HasSuggestion
{
    protected $suggestion;

    public function getSuggestion(){
        return $this->suggestion;
    }
}