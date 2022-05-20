<?php

// autoloader for model classes
spl_autoload_register(
    function ($class) {

        /* without namespacing */

        // if (file_exists("classes/models/" . $class . '.php')) {
        //     include_once  "classes/models/" . $class . '.php';
        // } else {
        //     include_once "classes/" . $class . '.php';
        // }

        // with namepacing
        include_once str_replace("\\", "/", $class) . ".php";
    }
);
