<?php namespace vhall\base;
/**
 * Created by PhpStorm.
 * User: NelsonKing
 * Date: 2017/3/31
 * Time: 10:23
 */

use Exception;

class guest implements model
{
    use common;

    public function register()
    {
        // TODO: Implement register() method.
        return new self;
    }

    public function url(array $param)
    {
        $paramCheck = [
            'webinar_id' => 'check',
            'email' => 'check',
            'name' => 'check',
            'is_sec_auth' => 'uncheck',
            'type' => 'uncheck'
        ];

        $requestData = $this->paramCheck($param, $paramCheck);
        $method = $this->getModel().'/'.__FUNCTION__;

        return $this->requestData($method ,$requestData);
    }
}
