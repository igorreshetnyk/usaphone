<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<?php include ROOT . '/views/admin/layouts/nav_comment.php'; ?>


<div class="col-md-9">
    <div class="row">

        <h4 class="admin-h4">Не опубликованые комментарии</h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID товара</th>
                <th>Tовар</th>
                <th>Имя пользователя</th>
                <th>Создан</th>
                <th>Рейтинг</th>
                <th>Сообщение</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo $comment['product_id']; ?></td>
                    <td><?php echo Product::getProdactById($comment['product_id'])['name']; ?></td>
                    <td><?php echo $comment['name']; ?></td>
                    <td><?php echo $comment['created']; ?></td>
                    <td><?php echo $comment['rating']; ?></td>
                    <td><?php echo $comment['message']; ?></td>
                    <td><a href="/admin/comment/edit/<?php echo $comment['id']; ?>"
                           title=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
                    <td><a href="/admin/comment/delete/<?php echo $comment['id']; ?>"
                           title=""><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>

<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>