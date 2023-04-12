<?php

namespace App\Controllers;

use Framework\Controller;


class AdminController extends Controller
{
    public function doitBaik($metod)
    {
        switch ($metod) {
            case 'create':
                echo '<h1>Создаем велосипед</h1>';
                break;
            case 'update':
                echo '<h1>Делаем что то с велосипедом</h1>';
                break;
        }

    }

}