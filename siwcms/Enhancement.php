<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/17/15
 * Time: 3:52 PM
 */
namespace siwcms;
abstract class Enhancement {

    private $_id;
    private $_confidence;
    private $_start;
    private $_end;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getConfidence()
    {
        return $this->_confidence;
    }

    /**
     * @param mixed $confidence
     */
    public function setConfidence($confidence)
    {
        $this->_confidence = $confidence;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->_start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->_start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->_end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->_end = $end;
    }




}