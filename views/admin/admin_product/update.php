<?php include ROOT . '/views/admin/layouts/headerAdmin.php'; ?>

<br/>


<h4>Редактировать товар #<?php echo $id; ?></h4>

<div class="form">
    <div class="login-form">
        <form action="#" method="post" enctype="multipart/form-data">

            <p>Название товара</p>
            <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

            <p>Артикул</p>
            <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

            <p>Стоимость, $</p>
            <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

            <p>Категория</p>
            <select name="category_id">
                <?php if (is_array($categoriesList)): ?>
                    <?php foreach ($categoriesList as $category): ?>
                        <option value="<?php echo $category['id']; ?>"
                                <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                    <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <br/><br/>

            <p>Производитель</p>
            <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

            <p>Изображение товара</p>

            <?php for ($i = 1; $i <= count(Product::getAllImage($product['id'])); $i++): ?>
                <img src="<?php echo Product::getAllImage($product['id'])[$i]; ?>" width="200" alt="" /><br>
                <!--<input type="button" value="Удалить" onclick="<?php //Product::deletePhoto(Product::getAllImage($product['id'])[$i]);?>">-->
                <input type="file" name="<?php echo $i ?>" placeholder="" value="">
                <br>
            <?php endfor; ?>
            <?php for ($i = count(Product::getAllImage($product['id']))+1; $i <= 6; $i++): ?>
                <input type="file" name="<?php echo $i ?>" placeholder="" value="">
                <br>
            <?php endfor; ?> 


            <p>Детальное описание</p>
            <textarea name="description"><?php echo $product['description']; ?></textarea>

            <br/><br/>

            <p>Наличие на складе</p>
            <select name="avallability">
                <option value="1" <?php if ($product['avallability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['avallability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Новинка</p>
            <select name="is_new">
                <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Рекомендуемые</p>
            <select name="is_recommend">
                <option value="1" <?php if ($product['is_recommend'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['is_recommend'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/>

            <p>Статус</p>
            <select name="status">
                <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
            </select>

            <br/><br/>

            <input id="submit" type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>

<?php include ROOT . '/views/admin/layouts/footerAdmin.php'; ?>