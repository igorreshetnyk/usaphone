<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>


<h4>Редактировать категорию "<?php echo $category['name']; ?>"</h4>

<div class="login-form">
    <form action="#" method="post">

        <p>Название</p>
        <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">

        <p>Порядковый номер</p>
        <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">

        <p>Статус</p>
        <select name="status">
            <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
            <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
        </select>

        <br><br>

        <input id="submit" type="submit" name="submit" class="btn btn-default" value="Сохранить">
    </form>
</div>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>
