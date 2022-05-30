<?php

/*
компонент для работы с корзиной
*/
class Cart
{

    public static function addProduct($id)
    {

        $id = intval($id);

        // созд. пуст. массив для товаров в карзине
        $productInCart = array();

        // если в корзине есть товар, то... добавим его в массив(сессию)
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }

        // проверка, есть ли такой товар в корзине
        if (array_key_exists($id, $productInCart)) {
            // ... есть товар? добавляем еще один такой же.
            $productInCart['id'] ++;
        } else {
            // нет товара?  добавляем его в корзину.
            $productInCart['id'] = 1;
        }

        // записываем массив с товарами в сессию
        $_SESSION['products'] = $productInCart;
        // возвращаем кол-во товаров в корзине
        return self::countItems();
    }

    /*
    количество товаров в сессии
    */
    public static function countItems()
    {

        // проверка, наличие товара в корзине
        if (isset($_SESSION['products'])) {
            // если массив с товарами есть, то подсчитывает их, и возвращает их число 
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // товаров нет? возврат 0
            return 0;
        }
    }
}