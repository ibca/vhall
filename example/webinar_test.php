<?php
require_once __DIR__.'/../autoload.php';

use vhall\Webinar;


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

// 创建活动
//$result = $webinarObj->create([
//    'subject' => '测试生成活动',
//    'start_time' => time() + 3600,
//    'type' => 1,
//]);

$result = $webinarObj->online_top_number([
    'webinar_id' => $webinarId
]);

dump($result);



