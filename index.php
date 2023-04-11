<?php

// FRONT CONTROLLER


//1 ОБЩИИ НАСТРОЙКИ
ini_set('display_errors', 1);
error_reporting(E_ALL);


//2 ПОДКЛЮЧЕНИЕ ФАЙЛОВ
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

if (file_exists(ROOT . '/vendor/autoload.php')) {
    require_once ROOT . '/vendor/autoload.php';
}

use Dotenv\Dotenv;//импорт класса Dotenv из пространства имен dotenv
if (file_exists(ROOT . "/.env")) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
    // var_dump($_ENV);
}
//3 УСТАНОВКА СОЕДИНЕНИЯ С БД
//$_DB = DB::getConnection();

session_start();

//4 ВЫЗОВ РОУТА
$router = new Router();
$router->run();
