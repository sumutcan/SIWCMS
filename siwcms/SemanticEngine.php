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
    private $_apiKey;

    public function __construct($apiKey=null)
    {
        $this->_apiKey = $apiKey;
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
    public function getModule($moduleName)
    {
       return $this->_modules[$moduleName];
    }
}