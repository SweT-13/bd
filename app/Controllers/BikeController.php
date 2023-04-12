<?php

namespace App\Controllers;

use App\Models\BikeModel;
use Framework\Controller;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = new BikeModel();
        $bikeList = $bikes->all();
        $tmp = [];
        foreach ($bikeList as $b) {
            if ($b['status'] == 'ready') {
                $tmp[] = $b;
            }
        }
        $bikeList = $tmp;
        $this->view('layouts/header.php');
        return $this->view('bike/index.php', ['bikeList' => $bikeList]);
    }

    public function showBike($id)
    {
        $bikes = new BikeModel();

        return $this->view('bike/viewbike.php', $bikes->getById($id));
    }
}