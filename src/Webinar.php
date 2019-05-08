<?php namespace Ibca\Vhall;

use Exception;

class Webinar extends Common
{
    /**
     * 设置直播封面
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function activeimage(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);

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

    /***
     * 创建直播
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function create(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 删除直播
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function delete(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 更新直播信息
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function update(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }


    /***
     * 查询直播信息
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function fetch(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 停止直播
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function stop(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 开始推流直播
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function push_start(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 直播报表
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function report(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 获取推流地址
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    public function get_stream_push_address(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = "get-stream-push-address";
        return $this->requestCurl($model, $func, $param);
    }



    /***
     * common request
     * @param $model
     * @param $func
     * @param array $param
     * @return bool|mixed
     * @throws Exception
     */
    private function requestCurl($model, $func, array $param)
    {
        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($param, $paramCheck);
        return $this->requestData($method, $requestData);
    }

}
