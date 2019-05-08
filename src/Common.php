<?php namespace Ibca\Vhall;

use Exception;

abstract class Common
{
    private $appKey;
    private $secretKey;
    private $requestDomain;
    private $showRequestUrl; // 是否显示构建请求信息 js console.log
    private $showRequestData; // 是否显示接口返回数据 js console.dir
    static $checkConfig;
    const HTTP_PROTOCOL = 'http';

    /**
     * Common constructor.
     * @param $config
     * @throws Exception
     */
    public function __construct($config)
    {
        if (!is_array($config)) {
            throw new Exception('配置文件类型不正确');
        }
        if (!isset($config['app_key'])) {
            throw new Exception('app_key 为必选项');
        }
        if (!isset($config['secret_key'])) {
            throw new Exception('secret_key 为必选项');
        }

        $this->appKey          = $config['app_key'];
        $this->secretKey       = $config['secret_key'];
        $this->requestDomain   = isset($config['request_domain']) ? $config['request_domain'] : 'e.vhall.com';
        $this->showRequestUrl  = isset($config['show_request_url']) ? $config['show_request_url'] : false;
        $this->showRequestData = isset($config['show_request_data']) ? $config['show_request_data'] : false;
    }

    /**
     * provide a list of php function must be rename
     *
     * @var array
     */
    static $funcRename = [
        'list' => 'getList'
    ];


    /**
     * get request mod class
     *
     * @return mixed
     */
    protected function getModel()
    {
        $localModelMsg = explode('\\', static::class);

        return strtolower($localModelMsg[count($localModelMsg) - 1]);
    }

    /**
     * according to function rename get real name
     *
     * @param $func
     * @return mixed
     */
    protected function getFunc($func)
    {
        return str_replace('_', '-', $func);
    }

    /**
     * get check rule data and real func
     *
     * @param $model
     * @param $action
     * @return array
     * @throws Exception
     */
    protected function listCheckAndFunc($model, $action)
    {
        if (!isset(self::$checkConfig)) {
            if (file_exists(__DIR__ . '/check.json')) {
                self::$checkConfig = json_decode(file_get_contents(__DIR__ . '/check.json'), 'true');
            } else {
                throw new Exception('配置文件缺失，请确认src目录下check.json是否存在');
            }
        }

        if (!isset(self::$checkConfig[$model][$action])) {
            throw new Exception('参数文件对应配置缺失');
        }

        return [self::$checkConfig[$model][$action], $model . '/' . $action];
    }


    /**
     * check api param which is must to filter useless
     *
     * @param $param
     * @param $checkData
     * @return array
     * @throws Exception
     */
    protected function paramCheck($param, $checkData)
    {
        $requestData = [];
        foreach ($checkData as $checkLogic => $paramMsg) {
            $paramMsg = explode(',', $paramMsg);
            foreach ($paramMsg as $value) {
                if ($checkLogic == 'do_check' && !isset($param[$value])) {
                    throw new Exception('字段' . $value . '为必传字段');
                }

                if (isset($param[$value]) && $param[$value]) {
                    $requestData[$value] = $param[$value];
                }
            }
        }

        return $requestData;
    }

    /**
     * @param $url
     * @param $param
     * @return bool|mixed
     * @throws Exception
     */
    protected function requestData($url, $param)
    {
        // 公共参数处理
        $param['auth_type'] = 2;
        $param['app_key']   = $this->appKey;
        $param['signed_at'] = time();
        $param['sign']      = $this->sign($param);

        // 获取调用信息
        $url = $this->requestDomain . '/api/vhallapi/v2/' . $url;

        $response = $this->CurlRequest($url, $param);

        // 构建请求地址
        if ($this->showRequestUrl) {
            $this->consoleLog(self::HTTP_PROTOCOL.'://'.$url.'?'.http_build_query($param),'log');
        }

        if ($response) {
            $response = json_decode($response, true);
            if (!is_array($response) || empty($response)) {
                throw new Exception('接口请求数据类型不对');
            }
            if (!isset($response['code'])) {
                throw new Exception('接口请求数据错误码非正常');
            }
            if (array_search($response['code'], [200, 10019]) === false) {
                throw new Exception($response['msg']);
            }

            // 显示返回数据
            if ($this->showRequestData) {
                $this->consoleLog($response);
            }
            return $response;
        } else {
            throw new Exception('接口请求失败');
        }
    }

    /**
     * 直接打印到console
     * @param $data
     * @param bool $log
     */
    protected function consoleLog($data, $log = false)
    {
        // 数据预处理json
        if (is_string($data) && $preJsonMsg = json_decode($data, true)) {
            if (count($preJsonMsg) > 1) {
                $data = $preJsonMsg;
            }
        }

        $logFunc = $log ? 'console.log' : 'console.dir';

        if (is_array($data) || is_object($data)) {
            echo("<script>".$logFunc."(".json_encode($data).");</script>");
        } else {
            echo("<script>".$logFunc."('".$data."');</script>");
        }
    }

    /**
     * @param $requestData
     * @return string
     * @throws Exception
     */
    protected function sign($requestData)
    {
        $str = '';
        if (!is_array($requestData)) {
            throw new Exception('签名数据类型不正确');
        }
        ksort($requestData);

        $signFilter = [
            'image'
        ];

        foreach ($requestData as $k => $v) {
            if (array_search($k, $signFilter) !== false) {
                continue;
            }
            $str .= $k . $v;
        }

        $str = $this->secretKey . $str . $this->secretKey;

        return md5($str);
    }

    /**
     * @param $url
     * @param string $data
     * @return bool|mixed
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

    /**
     * @param $name
     * @param array $arguments
     * @return bool|mixed
     */
    public function __call($name, array $arguments)
    {
        $model = $this->getModel();
        $func  = $this->getFunc($name);

        list($paramCheck, $method) = $this->listCheckAndFunc($model, $func);
        $requestData = $this->paramCheck($arguments[0], $paramCheck);

        return $this->requestData($method, $requestData);
    }

}
