<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/21/15
 * Time: 12:43 AM
 */

namespace siwcms;


class SemanticEngineOptions {
    private $_apiKey;
    private $auth;

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
    public function setApiKey($apiKey)
    {
        $this->_apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

}