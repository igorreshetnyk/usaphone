<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<br/>

<h4>Удалить коментарий #<?php echo $comment_id; ?></h4>


<p class="delete">Вы действительно хотите удалить этот коментарий?</p>

<form method="post">
    <input id="delete" type="submit" name="submit" value="Удалить" />
</form>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>

