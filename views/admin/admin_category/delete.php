<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<h4>Удалить категорию #<?php echo $id; ?></h4>

<p class="delete">Вы действительно хотите удалить эту категорию?</p>

<form method="post">
    <input id="submit" type="submit" name="submit" value="Удалить" />
</form>

<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>