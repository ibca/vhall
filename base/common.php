<?php namespace vhall\base;
use Exception;

trait common
{
    private function getModel()
    {
        $localModel = __CLASS__;
        $localModelMsg = explode('\\', $localModel);

        return $localModelMsg[count($localModelMsg) - 1];
    }

    protected function paramCheck($param, $checkData)
    {
        $requestData = [];

        foreach ($checkData as $paramIndex => $checkLogic) {
            if ($checkLogic == 'check') {
                if (!isset($param[$paramIndex])) throw new Exception('字段'. $paramIndex .'为必传字段');
                $requestData[$paramIndex] = $param[$paramIndex];
            } else {
                if (isset($param[$paramIndex]) && $param[$paramIndex]) {
                    $requestData[$paramIndex] = $param[$paramIndex];
                }
            }
        }

        return $requestData;
    }

    protected function requestData($url,$param)
    {
        // 公共参数处理
        $param['auth_type'] = 2;
        $param['app_key'] = APP_KEY;
        $param['signed_at'] = time();
        $param['sign'] = $this->sign($param);

        // 获取调用信息
        $url = REQUEST_DOAIN . '/api/vhallapi/v2/'. $url;

        $response = $this->CurlRequest($url, $param);

        if ($response) {
            $response = json_decode($response, true);
            if (!is_array($response)  || empty($response)) throw new Exception('接口请求数据类型不对');
            if (!isset($response['code'])) throw new Exception('接口请求数据错误码非正常');
            if (array_search($response['code'], [200, 10019]) === false) throw new Exception($response['msg']);

            return $response;
        } else {
            throw new Exception('接口请求失败');
        }
    }

    /**
     * 数据签名
     * @param $requestData
     * @return string
     * @throws Exception
     */
    protected function sign($requestData)
    {
        $str = '';
        if (!is_array($requestData)) throw new Exception('签名数据类型不正确');
        ksort($requestData);

        $signFilter = [
            'image'
        ];

        foreach ($requestData as $k => $v) {
            if (array_search($k, $signFilter) !== false)  continue;
            $str .= $k.$v;
        }

        $str = APP_SECRET.$str.APP_SECRET;

        return md5($str);
    }

    /**
     * 公共curl方法
     * Post
     * return.
     */
    protected function CurlRequest($url, $data = '')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $resultData = curl_exec($curl);

        if (curl_errno($curl)) {
            curl_close($curl);
            return false;
        } else {
            curl_close($curl);

            return $resultData;
        }
    }

}