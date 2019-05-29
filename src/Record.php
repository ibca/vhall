<?php namespace Ibca\Vhall;

/**
 * Created by PhpStorm.
 * User: NelsonKing
 * Date: 2017/3/31
 * Time: 11:46
 */


class Record extends Common
{
    /***
     * 获取回放列表
     * @param array $param
     * @throws \Exception
     */
    public function list(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        return $this->requestData($method, $param);
    }

    /***
     * 设置默认回放
     * @param array $param
     * @throws \Exception
     */
    public function default(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 生成回放
     * @param array $param
     * @throws \Exception
     */
    public function create(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * 回放视频时长
     * @param array $param
     * @throws \Exception
     */
    public function record_time(array $param)
    {
        $model = $this->getModel(__CLASS__);
        $func = $this->getFunc(__FUNCTION__);
        return $this->requestCurl($model, $func, $param);
    }

    /***
     * common request
     * @param $model
     * @param $func
     * @param array $param
     * @return bool|mixed
     */
    private function requestCurl($model, $func, array $param)
    {
        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($param, $paramCheck);
        return $this->requestData($method, $requestData);
    }
}
