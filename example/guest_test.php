<?php

require_once __DIR__.'/../autoload.php';

use vhall\Guest;


$webinarId = 250031234;

$config = [
    'app_key' => '19e934c79697b639eaaf35d78aa048f8',
    'secret_key' => 'de88a432a833ea1e82c485169f5c843b',
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
