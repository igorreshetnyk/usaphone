<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<br/>
<h4>Удалить заказ #<?php echo $id; ?></h4>

<p class="delete">Вы действительно хотите удалить этот заказ?</p>

<form method="post">
    <input id="submit" type="submit" name="submit" value="Удалить" />
</form>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>