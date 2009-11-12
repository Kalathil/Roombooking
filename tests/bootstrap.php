<?php /* Start output buffering */

 

/* Determine the root and library directories of the application */
$appRoot = dirname(__FILE__) . '/..';
$libDir = "$appRoot/library";
$path = array($libDir, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));
 
define('APPLICATION_PATH', $appRoot . '/application');
//define('APPLICATION_ENVIRONMENT', 'dev');
 
require_once "Zend/Loader.php";
Zend_Loader::registerAutoload();
 
