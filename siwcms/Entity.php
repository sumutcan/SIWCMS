<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/24/15
 * Time: 12:55 AM
 */
namespace siwcms;

use EasyRdf_Resource;
use EasyRdf_Graph;

abstract class Entity extends EasyRdf_Resource
{

   //private $_id = array();
    //private $_types = array();
    //private $_labels = array();

    private static $_mappings = array();


    public function getLabels()
    {
        return parent::allLiterals("rdfs:label");

    }
    public function getTypes()
    {
        return parent::types();
    }

    /**
     * @return array
     */
    public function getId()
    {

        return parent::getUri();

    }

    /**
     * @param $type
     * @param $class
     */
    public static function mapType($type,$class)
    {
        static::$_mappings[$type] = $class;
    }

    private static function getTypeClass(array $types)
    {
        foreach ($types as $type) {
            if (static::$_mappings[$type])
                return static::$_mappings[$type];
        }

        return null;
    }

    public static function create($entityAnno)
    {
        $graph = $entityAnno->getGraph();


        $entity = $graph->resource($entityAnno->get("stanbol:entity-reference"));
        $props= $entity->properties();
        $personGraph = new EasyRdf_Graph($entity->getUri());
        foreach ($props as $p )
        {
            $allRes = $entity->all($p);
            foreach($allRes as $r) {

                $personGraph->add($entity, $p,$r);
            }
        }
        $newClass = static::getTypeClass($entity->types());
        return new $newClass($personGraph);
    }

    public function getEntityID()
    {
        return parent::localName();
    }



}