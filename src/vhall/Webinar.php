<?php namespace vhall;

use Exception;

class Webinar extends Common
{
    public function activeimage(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func  = $this->getFunc(__FUNCTION__);

        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($param, $paramCheck);

        //  文件类型特殊处理
        $imageUrl = $requestData['image'];
        if (!file_exists($imageUrl)) {
            throw new Exception('文件不存在');
        }

        $requestData['image'] = new \CURLFile($imageUrl);

        return $this->requestData($method, $requestData);
    }

}