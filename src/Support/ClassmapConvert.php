<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 16:19
 */

namespace Reprover\Amap\Support;


class ClassmapConvert
{

    public static function toCamelCase($origin)
    {
        $result = [];
        $arr = explode("_", $origin);
        foreach ($arr as $key => $value)
            $result[$key] = ucfirst($value);
        return implode("", $result);
    }
}