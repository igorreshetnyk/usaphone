<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<br/>

<h4>Удалить товар #<?php echo $id; ?></h4>


<p class="delete">Вы действительно хотите удалить этот товар?</p>

<form method="post">
    <input id="delete" type="submit" name="submit" value="Удалить" />
</form>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>