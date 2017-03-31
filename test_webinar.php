<?php
require 'sdk.php';

// 请根据实际情况填写
define('APP_KEY', '9100f829ccabfeb689de7b08a0a57f2e');
define('APP_SECRET', 'dc9b53947c3d2d2a0d9c4067071576e6');
define('REQUEST_DOAIN', 'www.livhall.com');

$webinarId = 250031234;

// //文件上传
//$result = \vhall\sdk::action('webinar','activeimage',[
//    'webinar_id' => $webinarId,
//    'image' => __DIR__.'/logo.png'
//]);
//
//\vhall\dump($result);
//
//// 创建活动
//$result = \vhall\sdk::action('webinar','create',[
//    'subject' => '测试生成活动',
//    'start_time' => time() + 3600,
//    'type' => 1,
//]);
//
//\vhall\dump($result);
//
//// 获取发起直播页面URL
//$result = \vhall\sdk::action('webinar','start',[
//    'webinar_id' => $webinarId,
//]);
//\vhall\dump($result);
//
//// 获取活动信息
//$result = \vhall\sdk::action('webinar','fetch',[
//    'webinar_id' => $webinarId,
//    'fields' => 'id,user_id,subject,type'
//]);
//\vhall\dump($result);
//
//// 获取活动状态
//$result = \vhall\sdk::action('webinar','state',[
//    'webinar_id' => $webinarId,
//]);
//\vhall\dump($result);
//
// 获取活动列表
$result = \vhall\sdk::action('webinar','list', []);
\vhall\dump($result);
exit;
//
//// 更新活动信息
//$result = \vhall\sdk::action('webinar','update',[
//    'webinar_id' => $webinarId,
//    'subject' => '测试生成活动',
//]);
//\vhall\dump($result);
//
//// 结束活动
//$result = \vhall\sdk::action('webinar','stop',[
//    'webinar_id' => $webinarId,
//]);
//\vhall\dump($result);
//
//// 删除活动
//$result = \vhall\sdk::action('webinar','delete',[
//    'webinar_id' => $webinarId,
//]);
//\vhall\dump($result);
//
//// 获取嘉宾助理
//$result = \vhall\sdk::action('guest','url',[
//    'webinar_id' => $webinarId,
//    'email' => 'vhall@vhall.com',
//    'name' => 'vhall'
//]);
//\vhall\dump($result);

// 获取当前在线人数
$result = \vhall\sdk::action('webinar','current-online-number',[
    'webinar_id' => $webinarId,
]);
\vhall\dump($result);
