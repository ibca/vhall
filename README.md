# Vhall Web SDK for PHP
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://img.shields.io/packagist/v/vhall/web_sdk_php.svg)](https://packagist.org/packages/vhall/web_sdk)

## 安装

* 通过composer，这是推荐的方式
```bash
$ composer require ibca/vhall:dev-master
```
* 直接下载安装，SDK 没有依赖其他第三方库，但需要参照 composer的autoloader，增加一个自己的autoloader程序。

## 运行环境

| Vhall Web SDK版本 | PHP 版本 |
|:--------------------:|:---------------------------:|
|          1.0         |  cURL extension,   5.6,7.0 |

## 使用方法

### 使用composer
```php
use Ibca\Vhall\Webinar;

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
```

## 代码许可
Forked By https://github.com/vhall/web_sdk_php and Feat Comment Webinar

The MIT License (MIT).详情见 [License文件](https://github.com/vhall/web_sdk_php/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/vhall/web_sdk_php
