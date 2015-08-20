<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 6:42 PM
 */
namespace siwcms;
require_once "SemanticEngineModule.php";
class SemanticEngine {

    private $_modules = array();
    private $_options;

    /**
     * @param null $apiKey
     * @param null $auth - "username","password" format
     */
    public function __construct($apiKey=null,$auth=null)
    {
        $this->_options = new SemanticEngineOptions();
        $this->_options->setApiKey($apiKey);
        $this->_options->setAuth($auth);
    }

    /**
     * @param $moduleName
     * @param SemanticEngineModule $module
     * @return mixed
     */
    public function registerModule($moduleName, SemanticEngineModule $module)
    {
        $this->_modules[$moduleName] = $module;
    }

    /**
     * @param $moduleName
     * @return mixed
     */
    private function getModule($moduleName)
    {
       return $this->_modules[$moduleName];
    }

    public function runModule($moduleName, $operationName, $data)
    {
        $this->getModule($moduleName)->runOperation($operationName,$data,$this->_options);
    }
}