<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<div class="col-md-9">
    <div class="row">
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">

            <table class="table table-bordered">
                <tr>
                    <th>Id коментария</th>
                    <th>Продукт</th>
                    <th>Имя пользователя</th>
                    <th>Почта пользователя</th>
                    <th>Cоздан</th>
                </tr>

                <tr>
                    <td><?php echo $comment['id']; ?></td>


                    <td><?php echo Product::getProdactById($comment['product_id'])['name']; ?></td>


                    <td><?php echo $comment['name']; ?></td>

                    <td><?php echo $comment['email']; ?></td>


                    <td><?php echo $comment['created']; ?></td>
                </tr>
            </table>

            <h5>Содержание</h5>
            <textarea name="message"><?php echo $comment['message']; ?></textarea>

            <br/>

            <h5>Рейтинг</h5>
            <select name="rating">
                <option value="5" <?php if ($comment['rating'] == 5) echo ' selected="selected"'; ?>>Отличный товар рекомендую</option>
                <option value="4" <?php if ($comment['rating'] == 4) echo ' selected="selected"'; ?>>Хороший товар</option>
                <option value="3" <?php if ($comment['rating'] == 3) echo ' selected="selected"'; ?>>Неплохой товар</option>
                <option value="2" <?php if ($comment['rating'] == 2) echo ' selected="selected"'; ?>>Товар низкого качества</option>
                <option value="1" <?php if ($comment['rating'] == 1) echo ' selected="selected"'; ?>>Не рекомендую данный товар</option>
            </select>
            <h5>Видимость на сайте</h5>
            <select name="public">
                <option value="1" <?php if ($comment['public'] == 1) echo ' selected="selected"'; ?>>Опубликован</option>
                <option value="0" <?php if ($comment['public'] == 0) echo ' selected="selected"'; ?>>Неопубликован</option>
            </select>
            <br>
            <button class="btn btn-success btn-admin" type="submit" name="submit"> Опубликовать </button>

        </form>
    </div>
</div>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>

