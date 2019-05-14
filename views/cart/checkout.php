<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php //include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-9">
            <div class="row">
                <h3>Оформление заказа</h3>
                <br>
                <?php if ($result): ?>
                    <p>Заказ оформлен. Мы Вам перезвоним.</p>
                <?php else: ?>

                    <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>$</p><br/>

                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
                    <br>

                    <?php if (!$result): ?>

                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <form role="form" class="form-horizontal" action="#" method="post">
                            <div class="form-group">

                                <label for="name" class="col-sm-3 control-label">Имя пользователя</label>
                                <div class="col-sm-6">
                                    <input type="text" name="userName" placeholder="" class="form-control" id="name" value="<?php echo $userName; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">Номер телефона</label>
                                <div class="col-sm-6">
                                    <input type="text" name="userPhone" placeholder="" id="phone" class="form-control" value="<?php echo $userPhone; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coment" class="col-sm-3 control-label">Коментарий</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="5" name="userComment" placeholder="Сообщение"
                                              value="<?php echo $userComment; ?>"></textarea>

                                    <button type="submit" name="submit" class="btn btn-success button-form">Отправить</button>

                                </div>
                            </div>
                        </form>
                    </div>


                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<!-- END of content -->


<?php include ROOT . '/views/layouts/footer.php'; ?>
