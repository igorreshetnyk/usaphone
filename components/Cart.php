<?php

class Cart
{

    public static function addProduct($id)
    {

        $id = intval($id);

        $productInCart = array();

        if (isset($_SESSION['products']))
            $productInCart = $_SESSION['products'];

        if (array_key_exists($id, $productInCart)) {

            $productInCart[$id]++;
        } else {
            $productInCart[$id] = 1;
        }
        $_SESSION['products'] = $productInCart;

        return self::countItems();
    }

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $item) {
                $count = $count + $item;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return FALSE;
    }
    
   
    public static function getTotalPrice($products)
    {

        $productsInCarts = self::getProducts();
        //print_r($products);

        $total = 0;
        if ($productsInCarts) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCarts[$item['id']];
            }
        }
        return $total;
    }

    public static function deleteProduct($id)
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();
        // Удаляем из массива элемент с указанным id
        //print_r($productsInCart);
        unset($productsInCart[$id]);
        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    /**
     * Удаляет товар с указанным id из корзины
     * @param integer $id <p>id товара</p>
     */

}
