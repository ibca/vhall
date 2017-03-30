<?php namespace vhall\base;
use Exception;

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
        $paramCheck = [
            'webinar_id' => 'check',
            'image' => 'check',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        //  文件类型特殊处理
        $imageUrl = $requestData['image'];
        if (!file_exists($imageUrl)) throw new Exception('文件不存在');

        $requestData['image'] = new \CURLFile($imageUrl);

        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function create(array $param)
    {
        $paramCheck = [
            'subject' => 'check',
            'start_time' => 'check',
            'user_id' => 'uncheck',
            'use_global_k' => 'uncheck',
            'exist_3rd_auth' => 'uncheck',
            'auth_url' => 'uncheck',
            'failure_url' => 'uncheck',
            'introduction' => 'uncheck',
            'layout' => 'uncheck',
            'type' => 'uncheck',
            'auto_record' => 'uncheck',
            'is_chat' => 'uncheck',
            'host' => 'uncheck',
            'buffer' => 'uncheck',
            'is_allow_extension' => 'uncheck',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function start(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
            'is_sec_auth' => 'uncheck',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function fetch(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
            'fields' => 'check',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function state(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function getList(array $param)
    {
        $paramCheck = [];
        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/list';

        return $this->requestData($method ,$requestData);
    }

    public function update(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
            'subject' => 'uncheck',
            'start_time' => 'uncheck',
            'use_global_k' => 'uncheck',
            'exist_3rd_auth' => 'uncheck',
            'auth_url' => 'uncheck',
            'introduction' => 'uncheck',
            'layout' => 'uncheck',
            'is_open' => 'uncheck',
            'auto_record' => 'uncheck',
            'is_chat' => 'uncheck',
            'host' => 'uncheck',
            'buffer' => 'uncheck',
        ];

        $recheck = $requestData = $this->paramCheck($param, $paramCheck);
        // 数据更新字段检测
        unset($recheck['webinar_id']);
        if(empty($recheck)) throw new Exception('更新字段不能为空');

        $method = $this->getModel().'/'.__FUNCTION__;
        return $this->requestData($method ,$requestData);
    }

    public function stop(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }

    public function delete(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }


}