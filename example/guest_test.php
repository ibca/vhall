<?php

require_once __DIR__.'/../autoload.php';

use vhall\Guest;


$webinarId = 250031234;

$config = [
    'app_key' => '9100f829ccabfeb689de7b08a0a57f2e',
    'secret_key' => 'dc9b53947c3d2d2a0d9c4067071576e6',
    'request_domain' => 'www.livhall.com',
    'show_request_url' => true,
    'show_request_data' => true,
];

$guestObj = new Guest($config);
$result = $guestObj->url([
    'webinar_id' => $webinarId,
    'email' => 'vhall@vhall.com',
    'name' => 'vhall'
]);
