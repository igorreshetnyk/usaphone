
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-6">
            <div class="row">

                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form  class="form-horizontal comment-form" role="form" action="" method="post">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Введите email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <a href="#"><img src="../components/Captcha.php" class="img-capcha"/></a>
                            <input type = "text" class="capcha form-control" name="capcha" id="capcha" placeholder="Введитие цифры с изображения" />
                            <button type="submit" name="submit" class="btn btn-success button-form">  Войти  </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <p>Еще не зарегестрировались? <a href="/user/register">Регистрация</a></p>
                        </div>
                    </div>

                    <!-- Put this div tag to the place, where Auth block will be -->
                    <div id="vk_auth"></div>
                    <div id="vk_return"></div>
<!--                    <script type="text/javascript">
                        VK.Widgets.Auth("vk_auth", {width: "200px", onAuth: function (data) {
                                $.post("/user/authVk/", {}, function (data) {
                                    $("#vk_return").html(data);
                                });
                            }});
                    </script>-->

                    <!-- Put this div tag to the place, where Auth block will be -->
<!--                    <div id="vk_auth"></div>
                    <script type="text/javascript">
                        VK.Widgets.Auth("vk_auth", {width: "200px", onAuth: function (data) {
                                alert('user ' + data['uid'] + ' authorized');
                            }});
                    </script>-->

                </form>
            </div>
        </div>
    </div>
</div>

<!-- END of content -->



<?php include ROOT . '/views/layouts/footer.php'; ?>