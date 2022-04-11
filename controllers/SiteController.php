<?php

class SiteController
{

    // для главной страницы
    public function actionIndex()
    {

        // список последних товаров
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(10);

        // список категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        // подключаем вид
        require_once(ROOT.'/views/site/index.php');
        return true;
    }

}