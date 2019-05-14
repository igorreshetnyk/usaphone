
<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-9">
            <div class="row">
                <?php if ($result): ?>
                    <p>Сообщение отправлено</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <br>
                    <p>Напишите нам. Наш менеджер свяжется с Вами.</p>
                    <br>

                    <form role="form" class="form-horizontal" action="#" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Ваш email</label>
                            <div class="col-sm-6">
                                <input type="email" name="userEmail" placeholder="Email" class="form-control" id="name" 
                                       value="<?php echo $userEmail; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Cообщение</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="5" name="userText" placeholder="Сообщение"
                                          value="<?php echo $userText; ?>"></textarea>

                                <button type="submit" name="submit" class="btn btn-success button-form">Отправить</button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
        <?php endif; ?>


    </div> <!-- END of content -->

</div> <!-- END of main -->


<?php include ROOT . '/views/layouts/footer.php'; ?>
