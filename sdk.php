<?php namespace vhall;

use Exception;

define('SDK_PATH', dirname(__FILE__));
define('BASE', SDK_PATH.'/base');

spl_autoload_register(function ($class) {
    $explodeMsg = explode('\\', $class);
    $class = $explodeMsg[count($explodeMsg) - 1];
    $loadFile = BASE.'/'. $class. '.php';
    if (!file_exists($loadFile))  throw new Exception('加载文件不存在,请检查文件完整性');
    require $loadFile;
});

function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

class sdk
{
    static $app;

    static $_instance = null;

    private function __construct($model)
    {
        $model = '\vhall\base\\'.$model;
        $model = new $model();

        self::$app = $model->register();
    }

    public static function getInstance($model)
    {
        if (self::$_instance) {
            return self::$_instance;
        }
        self::$_instance = new self($model);

        return self::$_instance;
    }

    public static function action($action, $param)
    {
        try {
            if (!self::$app) throw new Exception('请求模型未实例化');
            $funcRename = [
                'list' => 'getList'
            ];

            if (isset($funcRename[$action])){
                $action = $funcRename[$action];
            }

            return self::$app->$action($param);
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }
}







