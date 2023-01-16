<?php
//
//
//class Product
//{
//    public static function getProductList()
//    {
//
//
//        $db = Db::getConnection();
//
//        $newsList = array();
//
//        $result = $db->query('SELECT id, title '
//            . 'FROM product '
//            . 'ORDER BY data DESC '
//            . 'LIMIT 10');
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $newsList[$i]['id'] = $row['id'];
//            $newsList[$i]['title'] = $row['title'];
//            $i++;
//        }
//
//        return $newsList;
//    }
//
//
//    public static function getProductById($id)
//    {
//
//    }
//}