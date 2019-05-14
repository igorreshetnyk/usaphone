<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-9">

            <div class="thumbnail">
             <!--   <img class="img-responsive" src="<?php echo Product::getImage($product['id']); ?>" alt=""> -->



                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href="">
                                        <img class="slide-image" src="<?php echo array_shift(Product::getAllImage($product['id'])); ?>" alt=""></a>
                                </div>
                                <?php for ($i = 2; $i <= count(Product::getAllImage($product['id'])); $i++) : ?>
                                    <div class="item">
                                        <img class="slide-image" src="<?php echo Product::getAllImage($product['id'])[$i] ?>" alt=""></a>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>




                <div class="caption-full">
                    <h4 class="pull-right">$<?php echo $product['price']; ?></h4>
                    <h4><a href="#"><?php echo $product['name']; ?></a>
                    </h4>
                    <p><?php echo $product['description']; ?></p>
                    <button type="submit" data_id="<?php echo $product['id']; ?>" name="submit"
                            class="btn btn-success add_to_cart" onclick="style.color = 'red'">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> В корзину</button><br><br>
                </div>
                <div class="ratings">

                    <p class="pull-right">3 reviews</p>
                    <p>
                        <?php for ($i = 0; $i < $rating; $i++): ?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < (5 - $rating); $i++): ?>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php endfor; ?>
                        <?php echo $rating; ?>.0 stars
                    </p>
                </div>
            </div>

            <div class="well">
                <div class="text-right">
                    <a class="comment btn btn-success" data_id="<?php echo $product['id']; ?> "
                       onclick="style.display = 'none'">Добавить комментарий</a>
                </div>
                <div id="comment_editor">

                </div>

                <hr>
                <?php foreach ($comments as $comment) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php for ($i = 0; $i < $comment['rating']; $i++): ?>
                                <span class="glyphicon glyphicon-star"></span>
                            <?php endfor; ?>
                            <?php for ($i = 0; $i < (5 - $comment['rating']); $i++): ?>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            <?php endfor; ?>
                            <?php echo $comment['name']; ?>
                            <span class="pull-right">Добавлено <?php echo substr($comment['created'], 0, 10); ?></span><br><br>
                            <p><?php echo $comment['message']; ?></p>
                        </div>
                    </div>
                    <hr>

                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>
<!-- /.container -->

<?php include ROOT . '/views/layouts/footer.php'; ?>

<script src="/template/js/cartController.js"></script>
<script src="/template/js/comment.js"></script>