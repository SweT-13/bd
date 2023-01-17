<?php


class Locals
{
    public static function getLocalsList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT *'
            . ' FROM locals'
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
    public static function getLocalsById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT *'
            . ' FROM locals'
            . ' WHERE id=:id'
            . '';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }
}