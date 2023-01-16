<?php

include_once ROOT . '/models/Product.php';

class ProductController
{
    public function actionIndex()
    {
        //all view
        $productList = array();
        $productList = Product::getProductList();

        require_once(ROOT.'/views/product/index.php');

        return true;
    }

    public function actionView($id)
    {
        //show one
        $productItem = Product::getProductById($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }

}