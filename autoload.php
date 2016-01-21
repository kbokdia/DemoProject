<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 19/12/15
 * Time: 6:17 PM
 */

define('PROJECT_NAME','Project');

function Autoload($className)
{
    $lastNsPos = strrpos($className, '\\');
    $namespace = substr($className,0,$lastNsPos + 1);
    $namespace = str_replace(PROJECT_NAME."\\",ROOT,$namespace);
    $namespace = str_replace('/',DIRECTORY_SEPARATOR,$namespace);
    $namespace = str_replace('\\',DIRECTORY_SEPARATOR,$namespace);
    $className = substr($className, $lastNsPos + 1);
    $fileName = $namespace.$className.'.php';
    require $fileName;
}

spl_autoload_register('Autoload');