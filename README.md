# Vhall Web SDK for PHP
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Build Status](https://travis-ci.org/vhall/web_sdk_php.svg)](https://travis-ci.org/vhall/web_sdk_php)
[![Latest Stable Version](https://img.shields.io/packagist/v/vhall/web_sdk_php.svg)](https://packagist.org/packages/vhall/web_sdk_php)

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
```php
use Vhall\Webinar;

...
    $webinarId = 250031234;
  
    $config = [
        'app_key' => '9100f829ccabfeb689de7b08a0a57f2e',
        'secret_key' => 'dc9b53947c3d2d2a0d9c4067071576e6',
        'request_domain' => 'www.livhall.com'
    ];
    
    $webinarObj = new Webinar($config);
    
    // 添加封面
    $result = $webinarObj->activeimage([
        'image' => __DIR__ . '/logo.png',
        'webinar_id' => $webinarId
    ]);
...
```

## 测试

``` bash
$ ./vendor/bin/phpunit tests/
```

## 常见问题

- 使用原生PHP异常处理错误，请使用catch(Exception $e) 进行捕获
- API 的使用 demo 可以参考 (https://github.com/vhall/web_sdk_php/example)。


## 联系我们

- 如果需要帮助，请提交工单（直接向 yan.gao@vhall.com 发送邮件）
- 更详细的文档，见[官方文档站](http://e.vhall.com/home/vhallapi)
- 如果发现了bug， 欢迎提交 [issue](https://github.com/vhall/web_sdk_php/issues)
- 如果有功能需求，欢迎提交 [issue](https://github.com/vhall/web_sdk_php/issues)

## 代码许可

The MIT License (MIT).详情见 [License文件](https://github.com/vhall/web_sdk_php/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/vhall/web_sdk_php
