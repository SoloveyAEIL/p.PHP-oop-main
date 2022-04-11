<?php

class ProductController
{

    public function actionView($productId)
    {
    
        // список категорий (по левому краю)
        $categories = Category::getCategoriesList();

        // информация о товаре
        $product = Product::getProductById($productId);

        require_once (ROOT.'/views/product/view.php');
        return true;
    }
}