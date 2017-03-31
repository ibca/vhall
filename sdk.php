<?php namespace vhall;

use Exception;
use vhall\base\model;

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

$funcRename = [
    'list' => 'getList'
];

class sdk
{
    static $app;

    static $_instance = null;

    private function __construct(){}

    public static $funcRename = [
        'list' => 'getList'
    ];


    public static function action($model, $action, $param)
    {
        self::getInstance($model);

        try {
            if (!self::$app) throw new Exception('请求模型未实例化');

            $action = self::delFunc($action);

            return self::$app[$model]->$action($param);
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    private static function getInstance($modelName)
    {
        if (isset(self::$_instance[$modelName])) {
            return self::$_instance[$modelName];
        }

        $model = '\vhall\base\\'.$modelName;
        $model = new $model();
        if (!$model instanceof model) throw new Exception('模型必须继承自model');

        self::$app[$modelName] = $model->register();
        self::$_instance[$modelName] = new self();

        return self::$_instance[$modelName];
    }

    private static function delFunc($action)
    {
        $action = str_replace('-','_',$action);

        if (isset(self::$funcRename[$action])){
            $action = self::$funcRename[$action];
        }

        return $action;
    }
}







