<?php

// FRONT CONTROLLER


//1 ОБЩИИ НАСТРОЙКИ
ini_set('display_errors', 1);
error_reporting(E_ALL);


//2 ПОДКЛЮЧЕНИЕ ФАЙЛОВ
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

//3 УСТАНОВКА СОЕДИНЕНИЯ С БД


session_start();

//4 ВЫЗОВ РОУТА
$router = new Router();
$router->run();
