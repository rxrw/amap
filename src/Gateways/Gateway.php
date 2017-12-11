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
use Reprover\Amap\Support\Validator;
use Reprover\Amap\Traits\HasHttpRequest;

abstract class Gateway implements GatewayInterface
{
    use HasHttpRequest;

    protected $config;
    protected $rules = [];
    protected $params;
    protected $uri = "";
    protected $base_config;

    /**
     * Gateway constructor.
     * @param $config
     * @param array $base_config
     */
    public function __construct($config, $base_config = [])
    {
        $this->config = new Config($config);
        $this->base_config = new Config($base_config);
    }

    /**
     * @throws InvalidArgumentException
     */
    final public function validate()
    {
        $validate = new Validator($this->config, $this->rules);
        $this->params = $validate->validate();
        if (method_exists($this, "unWrapParams"))
            $this->unWrapParams();
    }

    abstract public function ask();

    /**
     * @return Object
     * @throws \Reprover\Amap\Exceptions\CannotParseResponseException
     * @throws \Reprover\Amap\Exceptions\HttpException
     * @throws InvalidArgumentException
     */
    public function sendRequest()
    {
        $this->validate();
        return $this->get($this->uri, $this->params);
    }

    public function setKey($key)
    {
        $this->config->set("key", $key);
    }

    public function useHttps($status = true)
    {
        $this->base_config->set('use_https', $status);
    }

}