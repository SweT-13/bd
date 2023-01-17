<?php


class UserController
{
    public function actionIndex($params = null)
    {
        $login = '';
        $password = '';
        if (isset($_POST['submitIn'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkLogin($login)) {
                $errors[] = 'Логин должен быть не короче 3 символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 8 симовлов';
            }

            $userId = User::checkUserData($login, $password);

            if ($userId) {
                User::auth($userId);
                $_SESSION['login'] = $_POST['login'];
                header("Location: /index");
                return true;
            } else {
                $errors[] = 'Неправильные данные для входа';
            }
            $_SESSION["errors"] = $errors;
        }
        if (isset($params) && $params == 'logout') {
            session_unset();
        }
        header("Location: /index");
        return true;
    }

    public function actionShow()
    {

    }
}