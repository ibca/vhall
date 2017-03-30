## vhall web sdk 

## use namespace of vhall

## examles test.php

```php
require 'sdk.php';
// 请根据实际情况填写
define('APP_KEY', '9100f829ccabfeb689de7b08a0a57f2e');
define('APP_SECRET', 'dc9b53947c3d2d2a0d9c4067071576e6');
define('REQUEST_DOAIN', 'www.livhall.com');

$sdkModel = \vhall\sdk::getInstance('webinar');

// 文件上传
$result = $sdkModel->action('activeimage',[
    'webinar_id' => $webinarId,
    'image' => __DIR__.'/logo.png'
]);

\vhall\dump($result);
```