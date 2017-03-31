<?php namespace vhall\base;
use Exception;
use function vhall\dump;

class webinar implements model
{
    use common;

    public function register()
    {
        // TODO: Implement register() method.
        $app = new self();
        return $app;
    }

    public function activeimage(array $param)
    {
        $model = $this->getModel();
        $func = $this->getFunc(__FUNCTION__);

        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($param, $paramCheck);

        //  文件类型特殊处理
        $imageUrl = $requestData['image'];
        if (!file_exists($imageUrl)) throw new Exception('文件不存在');

        $requestData['image'] = new \CURLFile($imageUrl);

        $method = $this->getModel().'/'.$this->getfunc(__FUNCTION__);

        return $this->requestData($method ,$requestData);
    }

    public function __call($name, array $arguments)
    {
        $model = $this->getModel();
        $func = $this->getFunc($name);

        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($arguments, $paramCheck);

        return $this->requestData($method ,$requestData);
    }

}