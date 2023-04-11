<?php
//now use php 8.0
spl_autoload_register(function ($class_name) {
    $array_paths = array(
        '/models/',
        '/components/',
        '/src/',

    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
});
// old use php 7.1
//function autoload($class_name)
//{
//    $array_paths = array(
//        '/models/',
//        '/components/',
//
//    );
//
//    foreach ($array_paths as $path) {
//        $path = ROOT . $path . $class_name . '.php';
//        if (is_file($path)) {
//            include_once $path;
//        }
//    }
//}