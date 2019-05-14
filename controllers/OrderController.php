<?php

/**
 * Description of OrderController
 *
 * @author igor
 */
class OrderController {

    public function actionView($id) {

        $userId = User::checkLogged();


        $order = Order::getOrderById($id);
        if ($order['user_id'] != $userId) {
            header("Location: /cabinet/");
            die();
        } else {

            $productsQuantity = json_decode($order['products'], true);
            // Получаем массив с индентификаторами товаров
            $productsIds = array_keys($productsQuantity);

            // Получаем список товаров в заказе
            $products = Product::getProductByIds($productsIds);
            $total = 0;
            foreach ($products as $product) {
                $total = $product['price'] + $total;
            }
            // Подключаем вид
            require_once(ROOT . '/views/cabinet/view.php');
            return true;
        }
    }

    public function actionList() {

        $userId = User::checkLogged();


        $orders = Order::getOrderListByUserId($userId);

        require_once(ROOT . '/views/cabinet/list.php');
        return true;
    }

}
