<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 15:23
 * Description: 用于解析后的数据返回
 */

namespace Reprover\Amap\Support;

use stdClass;

abstract class Result implements \Countable, \IteratorAggregate, \ArrayAccess
{

    protected $status;
    protected $infocode;
    protected $info;
    protected $original;

    /**
     * @var array
     */
    protected $items;

    private $errList
        = [
            10000 => "请求正常",
            10001 => "key不正确或过期",
            10002 => "没有权限使用相应的服务或者请求接口的路径拼写错误",
            10003 => "访问已超出日访问量",
            10004 => "单位时间内访问过于频繁",
            10005 => "IP白名单出错，发送请求的服务器IP不在IP白名单内",
            10006 => "绑定域名无效",
            10007 => "数字签名未通过验证",
            10008 => "MD5安全码未通过验证",
            10009 => "请求key与绑定平台不符",
            10010 => "IP访问超限",
            10011 => "服务不支持https请求",
            10012 => "权限不足，服务请求被拒绝",
            10013 => "Key被删除",
            10014 => "云图服务QPS超限",
            10015 => "受单机QPS限流限制",
            10016 => "服务器负载过高",
            10017 => "所请求的资源不可用",
            10019 => "使用的某个服务总QPS超限",
            10020 => "某个Key使用某个服务接口QPS超出限制",
            10021 => "来自于同一IP的访问，使用某个服务QPS超出限制",
            10022 => "某个Key，来自于同一IP的访问，使用某个服务QPS超出限制",
            10023 => "某个KeyQPS超出限制",
            20000 => "请求参数非法",
            20001 => "缺少必填参数",
            20002 => "请求协议非法",
            20003 => "其他未知错误",
            20800 => "规划点（包括起点、终点、途经点）不在中国陆地范围内",
            20801 => "划点（起点、终点、途经点）附近搜不到路",
            20802 => "路线计算失败，通常是由于道路连通关系导致",
            20803 => "起点终点距离过长。",
            "300**" => "服务响应失败。",
        ];

    //各种赋值

    /**
     * Result constructor.
     *
     * @param stdClass $data
     */
    public function __construct($data)
    {
        $this->original = $data;
        $this->setStatus();
        $this->items = $this->setData();
        $this->setInfoCode();
    }

    /**
     * 结果是否有效
     *
     * @return bool
     */
    final public function isValid()
    {
        return $this->status == 1;
    }

    //设置真正的数据字段属性
    abstract protected function setData();

    /**
     *  设置状态，例如骑行导航这种坑爹的设定就要rewrite了
     */
    protected function setStatus()
    {
        $this->status = intval($this->original->status);
    }

    protected function setInfoCode()
    {
        $this->infocode = intval($this->original->infocode);
        $this->info = $this->original->info;
    }

    protected function getErrMsg($detail = false)
    {
        return $detail ? isset($this->errList[$this->infocode])
            ?: $this->errList["300**"] : $this->info;
    }

    public function count()
    {
        return is_array($this->items) ? sizeof($this->items) : 1;
    }

    /**
     * foreach用
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator(is_array($this->items) ?: [$this->items]);
    }

    public function __toString()
    {
        return json_encode($this->items);
    }

    /**
     * 获取items变量中的单个成员变量
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->items->$name;
    }

    /**
     * 获取单个成员变量
     *
     * @param $name
     *
     * @return mixed
     */
    public function getVariable($name)
    {
        return $this->$name;
    }

    /**
     * Whether a offset exists
     *
     * @link  https://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @link  https://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    /**
     * Offset to set
     *
     * @link  https://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    /**
     * Offset to unset
     *
     * @link  https://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}