<?php

$AutoLoader = function($PATH) use(&$AutoLoader)
{
    $DS = DIRECTORY_SEPARATOR;
    $dirs = glob($PATH . $DS . "*");



    foreach ($dirs as $path) {

        if (__FILE__ == $path) {
            continue;
        } elseif (is_dir($path)) {
            $AutoLoader($path);
        } else {
            require_once $path;
        }
    }

};

$AutoLoader(__DIR__);
