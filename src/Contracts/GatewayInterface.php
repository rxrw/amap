<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 14:40
 */

namespace Reprover\Amap\Contracts;


interface GatewayInterface
{

    //配置参数必传啊
    public function __construct($config);

    //验证是否已填写必填参数
    public function validate();

    //请求返回数据
    public function ask();

}