<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<?php include ROOT . '/views/admin/layouts/nav_comment.php'; ?>

<div class="col-md-9">
    <div class="row">
        <h4> Посмотреть комментарии за последнии n дней </h4>

        <form  class="form-horizontal comment-form" role="form" action="" method="post">
            <div class="form-group">
                <div class="col-sm-9">
                    <label>За сколько дней нужны комменты</label>
                    <input type="text" class="form-control" name="count_day" placeholder="Введите количество дней">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" name="submit" class="btn btn-success button-form"> Запрос </button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID товара</th>
                <th>Tовар</th>
                <th>Имя пользователя</th>
                <th>Создан</th>
                <th>Рейтинг</th>
                <th>Сообщение</th>
                <th>Видимость</th>
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
                    <td><?php if ($comment['public'] == 1) {
                echo 'Yes';
            } else {
                echo 'No';
            }
            ?></td>
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