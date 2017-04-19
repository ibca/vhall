# Vhall Web SDK for PHP
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://img.shields.io/packagist/v/vhall/web_sdk_php.svg)](https://packagist.org/packages/vhall/web_sdk)

## 安装

* 通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者运行下面的命令。SDK 包已经放到这里 [`vhall/web_sdk`][install-packagist] 。
```bash
$ composer require vhall/web_sdk
```
* 直接下载安装，SDK 没有依赖其他第三方库，但需要参照 composer的autoloader，增加一个自己的autoloader程序。

## 运行环境

| Vhall Web SDK版本 | PHP 版本 |
|:--------------------:|:---------------------------:|
|          1.0         |  cURL extension,   5.6,7.0 |

## 使用方法

### 上传
1 使用composer形式
```php
use Vhall\Webinar;

$webinarId = 250031234;

$config = [
    'app_key' => '9100f829ccabfeb689de7b08a0a57f2e',
    'secret_key' => 'dc9b53947c3d2d2a0d9c4067071576e6',
    'show_request_url' => true, // 是否显示构造请求连接&参数 json console (请勿在生产环境打开)
    'show_request_data' => true, // 是否显示接口返回数据 json console (请勿在生产环境打开)
];

$webinarObj = new Webinar($config);

// 添加封面
$result = $webinarObj->activeimage([
    'image' => __DIR__ . '/logo.png',
    'webinar_id' => $webinarId
]);

```

2 直接引入使用
```php
require_once __DIR__.'/../autoload.php';
use vhall\Webinar;

$webinarId = 250031234;

$config = [
    'app_key' => '9100f829ccabfeb689de7b08a0a57f2e',
    'secret_key' => 'dc9b53947c3d2d2a0d9c4067071576e6',
    'show_request_url' => true, // 是否显示构造请求连接&参数 json console (请勿在生产环境打开)
    'show_request_data' => true, // 是否显示接口返回数据 json console (请勿在生产环境打开)
];

$webinarObj = new Webinar($config);
// 添加封面
$result = $webinarObj->activeimage([
    'image' => __DIR__ . '/logo.png',
    'webinar_id' => $webinarId
]);
```

## 常见问题

- 使用原生PHP异常处理错误，请使用catch(Exception $e) 进行捕获
- API 的使用 demo 可以参考 (https://github.com/vhall/web_sdk_php/example)。
- SDK不需要时刻保持最新版本,如不想更改代码,仅需下载最新 src/check.json [![check.json](https://github.com/vhall/web_sdk_php/blob/master/src/check.json)](https://github.com/vhall/web_sdk_php/blob/master/src/check.json) 并更新即可使用最新接口


## 联系我们

- 如果需要帮助，请提交工单（直接向 yan.gao@vhall.com 发送邮件）
- 更详细的文档，见[官方文档站](http://e.vhall.com/home/vhallapi)
- 如果发现了bug， 欢迎提交 [issue](https://github.com/vhall/web_sdk_php/issues)
- 如果有功能需求，欢迎提交 [issue](https://github.com/vhall/web_sdk_php/issues)

## 代码许可

The MIT License (MIT).详情见 [License文件](https://github.com/vhall/web_sdk_php/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/vhall/web_sdk_php
