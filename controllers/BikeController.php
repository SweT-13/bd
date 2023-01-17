<?php


class BikeController
{
    public function actionIndex()
    {
        $bikeList = array();
        $bikeList = Bike::getBikeList();

        $is_admin = isset($_SESSION['user']) ? User::checkUserAdmin($_SESSION['user']) : 0;
        if (!$is_admin) {
            $tmp = [];
            foreach ($bikeList as $b) {
                if ($b['status'] == 'ready') {
                        $tmp[] = $b;
                }
            }
            $bikeList = $tmp;
        }
        $status = Statuses::getStatusList();
        $categories = Categories::getCategoryList();
        $locals = Locals::getLocalsList();
        require_once(ROOT . '/views/bike/index.php');

        return true;
    }

    public function actionView($id)
    {
        $status = Statuses::getStatusList();
        $categories = Categories::getCategoryList();
        $locals = Locals::getLocalsList();
        $bike = Bike::getBikeById($id);
        $bike['category'] = Categories::getCategoryById($bike['category_id'])['name'];
        $bike['local'] = Locals::getLocalsById($bike['local_id'])['name'];
        $bike['status'] = Statuses::getStatusById($bike['status_id'])['name'];
        $is_admin = isset($_SESSION['user']) ? User::checkUserAdmin($_SESSION['user']) : 0;
        require_once(ROOT . '/views/bike/viewbike.php');

        return true;
    }
}