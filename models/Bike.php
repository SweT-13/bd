<?php


class Bike
{
    public static function getBikeList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT bikes.id, bikes.model, categories.name "categories", locals.name "locals", statuses.name "status"'
            . ' FROM bikes,categories,locals,statuses'
            . ' WHERE bikes.category_id = categories.id and bikes.local_id = locals.id and bikes.status_id= statuses.id'
            . ' ORDER BY bikes.id'
            . ' ');

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

    public static function getBikeById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT *'
            . ' FROM bikes'
            . ' WHERE bikes.id =(:bikeid)'
            . ' ';
        $result = $db->prepare($sql);
        $result->bindParam(':bikeid', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function UpdateBikeById($id, $category, $model, $local, $status)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE bikes'
            . ' SET category_id = :category, model=:model, local_id=:local, status_id=:status'
            . ' WHERE id=:id'
            . ' ';
        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':model', $model, PDO::PARAM_STR);
        $result->bindParam(':local', $local, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function Create($category, $model, $local, $status)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO bikes'
            . ' (id,local_id,model,category_id,status_id)'
            . ' VALUES (NULL, :local, :model, :category, :status)'
            . ' ';
        $result = $db->prepare($sql);
        $result->bindParam(':local', $local, PDO::PARAM_INT);
        $result->bindParam(':model', $model, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();


    }
}