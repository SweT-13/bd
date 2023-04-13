<?php

namespace App\Models;

use Framework\Model;
use Framework\MysqlModel;

class BikeModel extends MysqlModel
{
    protected static $table = "bikes";

    public function deleteWhere($conditions)
    {
        // TODO: Implement deleteWhere() method.
    }

//    public function all()
//    {
//        $newsList = array();
//
//        $result = $this->connection->query('SELECT bikes.id, bikes.model, categories.name "categories", locals.name "locals", statuses.name "status"'
//            . ' FROM bikes,categories,locals,statuses'
//            . ' WHERE bikes.category_id = categories.id and bikes.local_id = locals.id and bikes.status_id= statuses.id'
//            . ' ORDER BY bikes.id'
//            . ' ');
//
//        $result->setFetchMode(\PDO::FETCH_ASSOC);
//
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $newsList[$i]['id'] = $row['id'];
//            $newsList[$i]['model'] = $row['model'];
//            $newsList[$i]['categories'] = $row['categories'];
//            $newsList[$i]['locals'] = $row['locals'];
//            $newsList[$i]['status'] = $row['status'];
//            $i++;
//        }
//        return $newsList;
//    }

}