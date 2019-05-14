<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<br/>

<h4>Список заказов</h4>

<br/>

<table class="table-bordered table-striped table">
    <tr>
        <th>ID заказа</th>
        <th>Имя покупателя</th>
        <th>Телефон покупателя</th>
        <th>Дата оформления</th>
        <th>Статус</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($ordersList as $order): ?>
        <tr>
            <td>
                <a href="/admin/order/view/<?php echo $order['id']; ?>">
                    <?php echo $order['id']; ?>
                </a>
            </td>
            <td><?php echo $order['user_name']; ?></td>

            <td><?php echo $order['user_phone']; ?></td>

            <td><?php echo $order['date']; ?></td>

            <td><?php echo Order::getStatusText($order['status']); ?></td>

            <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="">
                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i></a></td>

            <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="">
                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>

            <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="">
                    <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
        </tr>
    <?php endforeach; ?>
</table>



<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>