<?php

class Db
{
    public static function getConnection()
    {
        try {
            $db = new PDO("mysql:host=$_ENV[dbhost];dbname=$_ENV[dbname];charset=utf8mb4", $_ENV['dbuser'], $_ENV['dbpassword']);
//            $db = new PDO("mysql:host={$params['host']}; dbname={$params['dbname']}", $params['user'], $params['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ошибка подключения к бд";
            die();
        }
        return $db;

    }


}

