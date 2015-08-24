<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 10:44 PM
 */


namespace siwcms;
use \Httpful\Request;

abstract class Operation {

    private   $_result;
    private   $_method;
    private   $_headers;

    public function __construct($method=POST,array $headers=null)
    {
        $this->_method = $method;
        $this->_headers = $headers;
        $this->_result = null;
    }


    /**
     * @param $url
     * @param $data
     * @param array $options
     * @param null $auth
     * @param null $apiKey
     */
    public final function run($url, $data, array $options=null, $auth=null, $apiKey = null)
    {
        $this->preRun();
        $this->sendRequest($url, $data, $options, $auth, $apiKey);
        return $this->processResult();


    }

    /**
     * @return null
     */
    protected final function getResult()
    {
        return $this->_result;
    }

    protected abstract function preRun();


    private function sendRequest($url, $data, array $options=null, $auth=null, $apiKey = null)
    {

        array_merge($this->_headers,$options);


        if ($this->_method == GET) {

            $url = $url . http_build_query($data);
             $this->_result=Request::get($url)->send();
        }
        else if ($this->_method == POST) {

            if (isset($apiKey))
                $url .=array_keys($apiKey)[0]."=".array_values($apiKey)[0];

            $request = Request::post($url);

            foreach ($this->_headers as $key => $hdr)
                $request = $request->addHeader($key,$hdr);


            if ($this->headers["Content-Type"] = "application/x-www-form-urlencoded" and is_array($data))
                $request = $request->body(http_build_query($data));
            else
                $request = $request->body($data);

            if (isset($auth))
                $request = $request->authenticateWith(array_keys($auth)[0],array_values($auth)[0]);

            $this->_result = $request->send();
        }


    }
    protected abstract function processResult();

    /**
     * @param $key
     * @param $value
     *
     * Adds custom headers to request.
     */
    protected function addCustomHeader($key, $value)
    {
        $this->_headers[$key] = $value;
    }

}