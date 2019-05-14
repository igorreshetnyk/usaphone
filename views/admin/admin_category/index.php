<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>


<div class="col-md-9">
    <div class="row">

        <br/>
        <a href="/admin/category/create" class="btn btn-default">Добавить категорию</a>
        <h4 class="admin-h4">Список категорий</h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID категории</th>
                <th>Название категории</th>
                <th>Порядковый номер</th>
                <th>Статус</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($categoriesList as $category): ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['sort_order']; ?></td>
                    <td><?php echo Category::getStatusText($category['status']); ?></td>
                    <td><a href="/admin/category/update/<?php echo $category['id']; ?>"
                           title=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
                    <td><a href="/admin/category/delete/<?php echo $category['id']; ?>"
                           title=""><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>



<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>