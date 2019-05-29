<?php

use Ibca\Vhall\Record;
use Ibca\Vhall\Webinar;

require_once __DIR__.'/../autoload.php';



$webinarId = 250031234;

$config = [
    'app_key' => '19e934c79697b639eaaf35d78aa048f8',
    'secret_key' => 'de88a432a833ea1e82c485169f5c843b',
    'request_domain' => 'www.livhall.com',
    'show_request_url' => true,
    'show_request_data' => true,
];

try {
    $webinarObj = new Webinar($config);
} catch (Exception $e) {
}
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

$webinarObj = new Record($config);
$result = $webinarObj->list([
    'webinar_id' => '157499133'
]);
//            $result = $webinarObj->create([
//                'webinar_id' => '157499133',
//                'subject' => '测试3333',
//                'type' => 0,
//                'start_time' => '1558972800',
//                'end_time' => '1559145600'
//            ]);
//            $result = $webinarObj->list();
dd($result);

$result = $webinarObj->online_top_number([
    'webinar_id' => $webinarId
]);

dump($result);



