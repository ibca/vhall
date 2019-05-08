<?php namespace Ibca\Vhall;

class Chat extends Common
{
    /***
     * 获取直播历史聊天记录
     * @param array $param
     * @return bool|mixed
     */
    public function history(array $param)
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
