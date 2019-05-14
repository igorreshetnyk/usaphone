
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-6">
            <div class="row">
                <h4>Введите регистрационные данные</h4><br>
                <?php if ($register): ?>
                    <p>Потвердите ваш email</p>
                <?php else: ?>

                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                            <li class="error-message"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <form role="form" class="form-horizontal comment-form" action="#" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Имя</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="Введите Имя" value="<?php echo $name; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" placeholder="Введите email" value="<?php echo $email; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-2 control-label">Проверка</label>
                            <div class="col-sm-8">
                                <a href="#"><img src="../components/Captcha.php" class="img-capcha"/></a>
                                <input type = "text" class="capcha form-control" name="capcha" id="capcha" placeholder="Введитие цифры с изображения" />
                                <button type="submit" name="submit" class="btn btn-success button-form">Регистрация</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>

    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>