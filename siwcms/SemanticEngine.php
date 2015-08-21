<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 6:42 PM
 */
namespace siwcms;
require_once "SemanticEngineModule.php";
require_once "SemanticEngineOptions.php";
abstract class SemanticEngine {

    private $_modules = array();
    private $_options;


    public function __construct(SemanticEngineOptions $options)
    {
        $this->_options = $options;
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
       return $this->getModule($moduleName)->runOperation($operationName,$data,$this->_options);
    }
}