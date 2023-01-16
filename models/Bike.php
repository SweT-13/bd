<?php


class Bike
{

    public static function getBikeList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT bikes.id, bikes.model, categories.name "categories", locals.name "locals", status.name "status"'
            . ' FROM bikes,categories,locals,status'
            . ' WHERE bikes.category_id = categories.id and bikes.local_id = locals.id and bikes.status_id= status.id and status.name = "ready"'
            . '');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['model'] = $row['model'];
            $newsList[$i]['categories'] = $row['categories'];
            $newsList[$i]['locals'] = $row['locals'];
            $newsList[$i]['status'] = $row['status'];
            $i++;
        }
        return $newsList;
    }
}