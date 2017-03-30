<?php
require 'sdk.php';

// 请根据实际情况填写
define('APP_KEY', '9100f829ccabfeb689de7b08a0a57f2e');
define('APP_SECRET', 'dc9b53947c3d2d2a0d9c4067071576e6');
define('REQUEST_DOAIN', 'www.livhall.com');

$sdkModel = \vhall\sdk::getInstance('webinar');
$webinarId = 250031234;

 //文件上传
$result = $sdkModel->action('activeimage',[
    'webinar_id' => $webinarId,
    'image' => __DIR__.'/logo.png'
]);

\vhall\dump($result);

// 创建文件
//$result = $sdkModel->action('create',[
//    'subject' => '测试生成活动',
//    'start_time' => time() + 3600,
//    'type' => 1,
//]);
//
//\vhall\dump($result);

// 创建文件
//$result = $sdkModel->action('create',[
//    'subject' => '测试生成活动',
//    'start_time' => time() + 3600,
//    'type' => 1,
//]);
//
//\vhall\dump($result);

// 获取活动列表
//$result = $sdkModel->action('list', []);
//\vhall\dump($result);

// 更新活动信息
//$result = $sdkModel->action('update',[
//    'webinar_id' => $webinarId,
//    'subject' => '测试生成活动',
//]);
//
//\vhall\dump($result);
