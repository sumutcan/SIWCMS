<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/20/15
 * Time: 6:49 PM
 */

namespace siwcms;


class SemanticEngineModule {

    /**
     * Module RestFul API url
     * @var
     */
    private $_url;
    private $_operations = array();

    public function registerOperation($operationName,\siwcms\Operation $operation)
    {
        $this->_operations[$operationName] = $operation;
    }

    /**
     * @param $operationName
     * @param array $options
     */
    public function runOperation($operationName, array $options = null)
    {
        $this->_operations[$operationName]->run();
    }

}