## vhall web sdk 

## use namespace of vhall

## examles test.php

```php
require 'sdk.php';
// 请根据实际情况填写
define('APP_KEY', '9100f829ccabfeb689de7b08a0a57f2e');
define('APP_SECRET', 'dc9b53947c3d2d2a0d9c4067071576e6');
define('REQUEST_DOAIN', 'www.livhall.com');

 //文件上传
$result = \vhall\sdk::action('webinar','activeimage',[
    'webinar_id' => $webinarId,
    'image' => __DIR__.'/logo.png' // 文件绝对路径
]);

\vhall\dump($result);

```

### \vhall\sdk::action($model, $action, $param)
#### eg : webinar/activeimage 设置直播活动封面

1) webianr // $model
2) activeimage // $action
3) param // 数组形式参数