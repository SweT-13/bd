<?php


class AdminController
{
    public function actionDoitBaik($metod, $id = null)
    {
        if (User::checkUserAdmin($_SESSION['user'])) {
            switch ($metod) {
                case 'create':
                    $cat = (int)$_POST['categories'];
                    $loc = (int)$_POST['local'];
                    $st = (int)$_POST['status'];
                    if ($_POST['model'] != '' && Categories::getCategoryById($cat) && Locals::getLocalsById($loc) && Statuses::getStatusById($st)) {
                        if (!Bike::Create($cat, $_POST['model'], $loc, $st)) {
                            $_SESSION['messageAdd']['errors'][] = 'Ошибка добавления к базе данных';
                        } else {
                            $_SESSION['messageAdd']['message'][] = 'Запись создана';
                        }
                    } else {
                        $_SESSION['messageAdd']['errors'][] = 'Ошибка в веденых данных';
                    }
                    header('Location: /index');
                    break;
                case 'update':
                    $cat = (int)$_POST['categories'];
                    $loc = (int)$_POST['local'];
                    $st = (int)$_POST['status'];
                    if ($id && $_POST['model'] != '' && Categories::getCategoryById($cat) && Locals::getLocalsById($loc) && Statuses::getStatusById($st)) {
                        if (!Bike::UpdateBikeById((int)$id, $cat, $_POST['model'], $loc, $st)) {
                            $_SESSION['messageUpd']['errors'][] = 'Ошибка добавления к базе данных';
                        } else {
                            $_SESSION['messageUpd']['message'][] = 'Запись обновлена';
                        }
                    } else {
                        $_SESSION['messageUpd']['errors'][] = 'Ошибка в веденых данных';
                    }
                    header('Location: /bike/' . $id);
                    break;
            }
        }
        echo 'Плохая попытка хатскер) ';
        echo '<a href="/index"><p>назад</p></a>';


    }

    public function actionShow($id)
    {
        $bikeList = array();
        $bikeList = Bike::getBikeList();
        require_once(ROOT . '/views/admin/index.php');

        return true;
    }
}