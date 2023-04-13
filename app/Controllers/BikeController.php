<?php

namespace App\Controllers;

use App\Models\BikeModel;
use App\Models\UserModel;
use Framework\Controller;
use Framework\Request;

class BikeController extends Controller
{
    public function index(Request $request)
    {
        $bikes = new BikeModel();
        $bikeList = $bikes->all();
//        $tmp = [];
//        foreach ($bikeList as $b) {
//            if ($b['status'] == 'ready') {
//                $tmp[] = $b;
//            }
//        }
//        $bikeList = $tmp;
        $this->view('layouts/header.php');
//        var_dump(UserModel::getById($request->getUser()->id));
//        echo UserModel::getById($request->getUser()->id)->is_admin;
        return $this->view('bike/index.php', ['bikeList' => $bikeList, 'is_admin' => (int) UserModel::getById($request->getUser()->id)->is_admin]);
    }

    public function showBike(Request $request, int $id)
    {
        $bikes = new BikeModel();
        $this->view('layouts/header.php');
        return $this->view('bike/viewbike.php', [$bikes->getById($id)]);
    }
}