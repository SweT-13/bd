<?php


class BikeController
{
    public function actionIndex()
    {
        $bikeList = array();
        $bikeList = Bike::getBikeList();
        require_once(ROOT.'/views/bike/index.php');

        return true;
    }

    public function actionView($id)
    {

        require_once(ROOT.'/views/bike/viewbike.php');

        return true;
    }
}