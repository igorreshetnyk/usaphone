<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>


<h4>Добавить новый товар</h4>

<br/>

<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="col-lg-4">
    <div class="login-form">
        <form action="#" method="post" enctype="multipart/form-data">

            <p>Название товара</p>
            <input type="text" name="name" placeholder="" value="">

            <p>Артикул</p>
            <input type="text" name="code" placeholder="" value="">

            <p>Стоимость, $</p>
            <input type="text" name="price" placeholder="" value="">

            <p>Категория</p>
            <select name="category_id">
                <?php if (is_array($categoriesList)): ?>
                    <?php foreach ($categoriesList as $category): ?>
                        <option value="<?php echo $category['id']; ?>">
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <br/><br/>

            <p>Производитель</p>
            <input type="text" name="brand" placeholder="" value="">

            <p>Изображение товара</p>
            <input type="file" name="1" placeholder="" value="">
            <input type="file" name="2" placeholder="" value="">
            <input type="file" name="3" placeholder="" value="">
            <input type="file" name="4" placeholder="" value="">
            <input type="file" name="5" placeholder="" value="">
            <input type="file" name="6" placeholder="" value="">

            <p>Детальное описание</p>
            <textarea name="description"></textarea>

            <br/><br/>

            <p>Наличие на складе</p>
            <select name="avallability">
                <option value="1" selected="selected">Да</option>
                <option value="0">Нет</option>
            </select>

            <br/><br/>

            <p>Новинка</p>
            <select name="is_new">
                <option value="1" selected="selected">Да</option>
                <option value="0">Нет</option>
            </select>

            <br/><br/>

            <p>Рекомендуемые</p>
            <select name="is_recommend">
                <option value="1" selected="selected">Да</option>
                <option value="0">Нет</option>
            </select>

            <br/><br/>

            <p>Статус</p>
            <select name="status">
                <option value="1" selected="selected">Отображается</option>
                <option value="0">Скрыт</option>
            </select>

            <br/><br/>

            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>


<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>