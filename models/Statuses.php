<?php


class status
{
    public static function getStatusList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT *'
            . ' FROM status'
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

    }
}