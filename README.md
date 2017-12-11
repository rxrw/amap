# 高德开放平台API封装SDK

## 需求
> php >=7.0.0
> guzzlehttp/guzzlehttp:^6.3

没有安装guzzlehttp也不要紧，在require的时候回自动安装

## 安装

> composer require reprover/amap

## 用法：

> use Reprover\Amap\Amap;

(1)
> $amap = new Amap();
> $gateway = $amap->uses("Georegeo")->gateway("geo")->build(["key"=>"你的api key",...其他选项]);
> $result = $gateway->ask();

(2)
> $gateway = Amap::use("georegeo")->gateway("regeo")->build(...);
> $result = $gateway->ask();

(3)
如果请求的接口大类只有一个子方法（例如坐标转换），则可以省略gateway()方法
> $gateway = Amap::use("convert")->build(...);
> $result = $gateway->ask();

返回结果为一个Reprover\AMap\Support\Result对象，类似于Laravel的Collection，不过没那么全面。可用的方法：
>count() :int
所得数据结果数量，如果有多种类型结果则只返回主要数据（如天气只返回实时天气数量，天气预报也可以用$result->forecast）获取。

>foreach($result as $k=>$v){...}
可以用foreach进行结果的循环

>isValid() :boolean
判断结果是否正确，即根据高德返回数据status(errcode)是否为1(0)

部分特殊接口有一些特殊用法，开发ing

## 说明：
这个sdk是第一版，还存在很多不足的地方，欢迎大家提交pr和issue！同时也在版本迭代中，建议大家不要急于将此插件用于生产环境中～

## 接下来的任务：
优化类名和驼峰法命名
修改验证类规则（现在是一个方法，需要写一个类）
优化使用方法，注入配置项等

