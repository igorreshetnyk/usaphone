<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<div class="col-md-9">
    <div class="row">

        <br/>

        <a href="/admin/product/create" class="btn btn-default">Добавить товар</a>

        <br><br>

        <h4 class="admin-h4">Список товаров</h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID товара</th>
                <th>Артикул</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($productsList as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><a href="/admin/product/update/<?php echo $product['id']; ?>"
                           title=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
                    <td><a href="/admin/product/delete/<?php echo $product['id']; ?>"
                           title=""><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>