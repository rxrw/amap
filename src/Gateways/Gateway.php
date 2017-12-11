<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/8
 * Time: 14:04
 */

namespace Reprover\Amap\Gateways;


use Reprover\Amap\Contracts\GatewayInterface;
use Reprover\Amap\Exceptions\InvalidArgumentException;
use Reprover\Amap\Support\Config;
use Reprover\Amap\Traits\HasHttpRequest;

abstract class Gateway implements GatewayInterface
{
    use HasHttpRequest;

    protected $config;
    protected $rules = [];
    protected $params;
    protected $uri = "";

    /**
     * Gateway constructor.
     * @param $config
     * @throws InvalidArgumentException
     */
    public function __construct($config)
    {
        $this->config = new Config($config);
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     */
    final public function validate()
    {
        $switch = 0;
        $hasSwitch = false;
        foreach ($this->rules as $k => $v) {
            if ($v == "required" && !$this->config->get($k))
                throw new InvalidArgumentException("The {" . $k . "} is Required.");
            if ($v == "switch") {
                $switch++;
                $hasSwitch = true;
            }
            if ($this->config->get($k))
                $this->params[$k] = $this->config->get($k);
        }
        if ($switch == 0 && $hasSwitch)
            throw new InvalidArgumentException("Some Param Unable To ");

        if (method_exists($this, "unWrapParams"))
            $this->unWrapParams();
    }

    abstract public function ask();

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     */
    public function sendRequest()
    {
        return $this->get($this->uri, $this->params);
    }

}