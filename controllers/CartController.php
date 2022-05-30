<?php 

class CartController
{

    public function actionAdd($id)
    {

        // добавить товар в корзину
        Cart::addProduct($id);

        // Возврат пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }
}