<?php


class User
{
    public static function checkUserAdmin($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch()['is_admin'];
        }
    }

    /**
     * Получение данных пользователя по id
     * @param $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    /**
     * Поиск пользователя в таблице по параметрам
     * @param $login
     * @param $password
     * @return int(user_id)/bool
     */
    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * '
            . 'FROM users '
            . 'WHERE login=(:login) AND password=(:password) ';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
//        $tmp = md5($password);
        $tmp = $password;
        $result->bindParam(':password', $tmp, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    /**
     * Проверяет валид пароль: не меньше, чем 8 символов
     * @param $password
     * @return bool
     */
    public static function checkLogin($login)
    {
        if (strlen($login) >= 3) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет валид пароль: не меньше, чем 8 символов
     * @param $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    /**
     * Добавление в ссесию параметра
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
}