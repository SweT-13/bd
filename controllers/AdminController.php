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
                    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0 && $file = fopen($_FILES['image']['tmp_name'], 'r+')) {
                        $ext = explode('.', $_FILES['image']['name']);
                        $filename = 'file_' . $ext[0] .'-'. rand(100000, 999999) . '.' . $ext[count($ext) - 1];
                        $resource = Container::getFileUploader()->store($file, $filename);
                        $image_url = $resource['ObjectURL'];
                    } else
                        $image_url = '\template\image\bicycle_bike_icon_125637.svg';
                    if ($_POST['model'] != '' && Categories::getCategoryById($cat) && Locals::getLocalsById($loc) && Statuses::getStatusById($st)) {
                        if (!Bike::Create($cat, $_POST['model'], $loc, $st, $image_url)) {
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
                    $image_url = 0;
                    if(isset($_POST['deleteImg'])){
                        $image_url = '\template\image\bicycle_bike_icon_125637.svg';
                        Container::getFileUploader()->delete($_POST['image']);
                    }
                    elseif (isset($_FILES['image']) && $_FILES['image']['size'] != 0 && $file = fopen($_FILES['image']['tmp_name'], 'r+')) {
                        $ext = explode('.', $_FILES['image']['name']);
                        $filename = 'file_' . $ext[0] .'-'. rand(100000, 999999) . '.' . $ext[count($ext) - 1];
                        $resource = Container::getFileUploader()->store($file, $filename);
                        $image_url = $resource['ObjectURL'];
                    }
                    if ($id && $_POST['model'] != '' && Categories::getCategoryById($cat) && Locals::getLocalsById($loc) && Statuses::getStatusById($st)) {
                        if (!Bike::UpdateBikeById((int)$id, $cat, $_POST['model'], $loc, $st, $image_url)) {
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

    public static function pushImage()
    {
        if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')) {
            $ext = explode('.', $_FILES['filename']['name']);
            $ext = $ext[count($ext) - 1];
            $filename = 'file' . rand(100000, 999999) . '.' . $ext;

            $resource = Container::getFileUploader()->store($file, $filename);
            $image_url = $resource['ObjectURL'];
        } else
            $image_url = '\template\image\bicycle_bike_icon_125637.svg';
        return $image_url;
    }

}