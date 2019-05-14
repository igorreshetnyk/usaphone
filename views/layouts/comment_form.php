<form role="form" class="form-horizontal comment-form" action="#" method="post">
    <?php if (isset($errors)) : ?>
        <ul class="error-message">
            <?php foreach ($errors as $error) : ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Ваше имя</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="name" placeholder="name" class="form-control"
                   value=""/>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Ваш email</label>
        <div class="col-sm-6">
            <input type="email" name="userEmail" id="mail" placeholder="Email" class="form-control"
                   value=""/>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Оценка товара</label>
        <div class="col-sm-6">
            <select type="" name="rating" id="rating" placeholder="rating" class="form-control"
                    value="">
                <option selected value="5">Отличный товар, рекомендую</option>
                <option value="4">Хороший товар</option>
                <option value="3">Неплохой товар</option>
                <option value="2">Товар низкого качества</option>
                <option value="1">Не рекомендую данный товар</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="text" class="col-sm-2 control-label">Комментарий</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="5" name="userText" id="text" placeholder="Напишите ваш комментарий"
                      value=""></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="text" class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
            <a href="#"><img src="../components/Captcha.php" class="img-capcha"/></a>
            <input type = "text" class="capcha form-control" id="capcha" placeholder="Введитие цифры с изображения" />
            <button data_id="<?php echo $productId; ?> "
                    class="btn btn-success button-form">Отправить</button>
        </div>
    </div>

</form>

<script>
    $(document).ready(function () {
        $(".button-form").click(function () {
            var id = $(this).attr("data_id");
            name = $("#name").val();
            mail = $("#mail").val();
            text = $("#text").val();
            rating = $("#rating").val();
            capcha = $("#capcha").val();

            $.post("/comment/add/" + id, {name: name, mail: mail, rating: rating, text: text, capcha: capcha}, function (data) {
                $("#comment_editor").html(data);
            });
            return false;
        });
    });
</script>