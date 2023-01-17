<?php


class Statuses
{
    public static function getStatusList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT *'
            . ' FROM statuses'
            . ''
            . '');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $newsList;
    }

    public static function getStatusById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT *'
            . ' FROM statuses'
            . ' WHERE id=:id'
            . '';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }
}