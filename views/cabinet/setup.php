<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">

        <?php include ROOT . '/views/layouts/menu_user_cabinet.php'; ?>

        <div class="col-md-4">
            <div class="row">

                <h3>Кабинет пользоветеля</h3>
                <?php if ($result): ?>
                    <p>Данные отредактированы</p>
                <?php else: ?>

                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form role="form" action="#" method="post">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" name="name" placeholder="Имя">
                            <p class="help-block">Изменить имя</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Введите email">
                            <p class="help-block">Изменить Email</p>
                        </div>
                        <div class="form-group">
                            <label for="pass">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                            <p class="help-block">Изменить пароль</p>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success button-form">Отправить</button>
                    </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
