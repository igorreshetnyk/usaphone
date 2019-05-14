<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">

        <?php include ROOT . '/views/layouts/menu_user_cabinet.php'; ?>

        <div class="col-md-6">
            <div class="row">
                <h4> Добро пожаловать <?php echo $order['user_name']; ?>!</h4><br>
                <p>Ваш заказ номер <?php echo $order['id']; ?><p><br>

                <h5>Информация о заказе</h5>
                <table class="table-admin-small table-bordered table-striped table">
                    <tr>
                        <td>Номер заказа</td>
                        <td><?php echo $order['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Имя клиента</td>
                        <td><?php echo $order['user_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Телефон клиента</td>
                        <td><?php echo $order['user_phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Комментарий клиента</td>
                        <td><?php echo $order['user_comment']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Статус заказа</b></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Дата заказа</b></td>
                        <td><?php echo $order['date']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Сумма заказа</b></td>
                        <td>$<?php echo $total; ?></td>
                    </tr>
                </table>

                <h5>Товары в заказе</h5>

                <table class="table-admin-medium table-bordered table-striped table ">
                    <tr>
                        <th>Код товара</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['code']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td>$<?php echo $product['price']; ?></td>
                            <td><?php echo $productsQuantity[$product['id']]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <br>
            </div>
        </div>
    </div>
</div> <!-- END of container -->

<?php include ROOT . '/views/layouts/footer.php'; ?>