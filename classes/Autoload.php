<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 14:14
 */
class Autoload
{
    private static $classDirectory = './classes/';

    public static function classesAutoloader($class) {
        $path = static::$classDirectory . "$class.php";
        if (file_exists($path) && is_readable($path)) require $path;
    }

}