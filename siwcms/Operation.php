<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 10:44 PM
 */

namespace siwcms;


use Httpful\Request;

abstract class Operation {

    protected $_result;
    private   $_method;
    private   $_headers;

    public function __construct($method=POST,array $headers=null)
    {
        $this->_method = $method;
        $this->_headers = $headers;
        $this->_result = null;
    }

    public  function run($url, $data=null, array $options=null)
    {
        if ($this->_method == GET) {
             $url = $url . http_build_query($options);
             $this->_result=Request::get($url)->send();
        }
        else if ($this->_method == POST) {

            $request = Request::post($url);

            foreach ($this->headers as $key => $hdr)
                $request = $request->addHeader($key,$hdr);


            if ($this->headers["Content-Type"] = "application/x-www-form-urlencoded")
                $request = $request->body(http_build_query($options));
            else
                $request = $request->body($data);

            $this->_result = $request->send();
        }

        $response=\Httpful\Request::post($url)->
      authenticateWith("admin","admin")->addHeader("Accept","application/rdf+xml")->
        body($data, 'text/plain')->send();
    }
    public abstract function getResult();
}