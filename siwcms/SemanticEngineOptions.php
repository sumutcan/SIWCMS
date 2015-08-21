<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/21/15
 * Time: 12:43 AM
 */

namespace siwcms;


abstract class SemanticEngineOptions {
    private $_apiKey = array();
    private $_auth = array();
    private $_customHeaders = array();
    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->_apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKeyName, $apiKey)
    {
        if (array_count_values($this->_apiKey) > 0) {
            unset($this->_apiKey);
            $this->_apiKey = array();
            $this->_apiKey[$apiKeyName] = $apiKey;
            return;
        }

        $this->_apiKey[$apiKeyName] = $apiKey;
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return $this->_auth;
    }


    public function setAuth($username,$password)
    {
        $this->_auth[$username] = $password;
    }

    public function addCustomHeader($key,$value)
    {
        $this->_customHeaders[$key] = $value;
    }

    /**
     * @return array
     */
    public function getCustomHeaders()
    {
        return $this->_customHeaders;
    }


}