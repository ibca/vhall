<?php
require_once __DIR__.'/../autoload.php';

use vhall\Webinar;


$webinarId = 250031234;

$config = [
    'app_key' => '19e934c79697b639eaaf35d78aa048f8',
    'secret_key' => 'de88a432a833ea1e82c485169f5c843b',
    'request_domain' => 'www.livhall.com',
    'show_request_url' => true,
    'show_request_data' => true,
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



