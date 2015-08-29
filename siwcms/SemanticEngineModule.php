<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 6:49 PM
 */

namespace siwcms;


abstract class SemanticEngineModule {

    /**
     * Module RestFul API url
     * @var
     */
    private $_url;

    private $_moduleOptions = array();

    /**
     * @return array
     */
    public function getModuleOptions()
    {
        return $this->_moduleOptions;
    }

    /**
     * @param array $moduleOptions
     */
    public function setModuleOptions(array $moduleOptions)
    {
        $this->_moduleOptions = $moduleOptions;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    private $_operations = array();

    public function registerOperation($operationName, Operation $operation)
    {
        $this->_operations[$operationName] = $operation;
    }

    /**
     * @param $operationName
     * @param $data
     * @param SemanticEngineOptions $semEngOptions
     * @return
     * @internal param array $options
     */
    public function runOperation($operationName, $data, SemanticEngineOptions $semEngOptions)
    {
        $options = array();
        $auth = $semEngOptions->getAuth();
        $apiKey = $semEngOptions->getApiKey();
        array_merge($options,$semEngOptions->getCustomHeaders());
        array_merge($options,$this->_moduleOptions);
        return $this->_operations[$operationName]->run($this->_url,$data,$options,$auth,$apiKey);

    }



}