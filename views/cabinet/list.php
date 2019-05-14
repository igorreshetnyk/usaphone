<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/menu_user_cabinet.php'; ?>
        <div class="col-md-6">
            <div class="row">
                <h4>Тут все ваши заказы</h4>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Дата оформления</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                    <?php echo $order['id']; ?>
                                </a>
                            </td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo Order::getStatusText($order['status']); ?></td>    
                            <td><a href="/order/view/<?php echo $order['id']; ?>" title="Смотреть">Смотреть</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>
</div>
