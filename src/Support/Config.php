<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 14:29
 */

namespace Reprover\Amap\Support;


class Config
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get($k)
    {
        if (isset($this->config[$k]))
            return $this->config[$k];
        else
            return null;
    }

    public function set($key, $value)
    {
        $this->config[$key] = $value;
    }


}