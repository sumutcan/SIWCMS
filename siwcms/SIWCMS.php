<?php
/**
 * Created by PhpStorm.
 * User: umutcan
 * Date: 8/19/15
 * Time: 12:05 AM
 */

require_once dirname(__FILE__)."/../easyrdf/lib/EasyRdf.php";
require_once dirname(__FILE__)."/../Httpful/Bootstrap.php";
use Httpful\Bootstrap;

Bootstrap::init();
define("POST","post");
define("GET","get");
require_once "Enhancement.php";
require_once "SemanticEngine.php";
require_once "Operation.php";
require_once "SemanticEngineModule.php";

