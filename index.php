<?php

    use Dotenv\Dotenv;
    use Framework\Container;

    date_default_timezone_set('Asia/Yekaterinburg');
    if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
        require_once dirname(__FILE__).'/vendor/autoload.php';
    }
    if (file_exists(".env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
        echo "Окружение загружено<p>";
        // var_dump($_ENV);
    }
    else {
        echo "Ошибка хагрузки ENV<br>";
    }
    session_start();
    Container::getApp()->run();
    exit();
?>
